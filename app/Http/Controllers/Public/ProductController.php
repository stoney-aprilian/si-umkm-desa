<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Products displayed per page.
     */
    private const PER_PAGE = 9;



    /**
     * Display product catalogue.
     */
    public function index(
        Request $request
    ): View {

        $search = trim(
            $request->string('search')
        );

        $category = trim(
            $request->string('category')
        );



        return view(
            'public.products.index',
            [
                'products' => $this->products(
                    $search,
                    $category
                ),

                'categories' => $this->categories(),

                'search' => $search,

                'category' => $category,
            ]
        );
    }





    /**
     * Display product detail.
     */
    public function show(
        Product $product
    ): View {

        $product->load([
            'umkm:id,business_name,slug,category_id,status,is_active',
            'umkm.category:id,name,slug',
        ]);



        abort_unless(

            $product->is_active
            &&
            $product->umkm
            &&
            $product->umkm->status === 'approved'
            &&
            $product->umkm->is_active,

            404

        );



        return view(
            'public.products.show',
            compact('product')
        );
    }





    /**
     * Active categories.
     */
    private function categories(): Collection
    {
        return Category::query()

            ->active()

            ->select([
                'id',
                'name',
                'slug',
            ])

            ->orderBy('name')

            ->get();
    }





    /**
     * Product listing.
     */
    private function products(
        ?string $search,
        ?string $category
    ): LengthAwarePaginator {

        return Product::query()

            ->active()

            ->select([
                'id',
                'umkm_id',
                'name',
                'slug',
                'description',
                'price',
                'is_featured',
            ])

            ->with([
                'umkm:id,business_name,slug,category_id',
                'umkm.category:id,name,slug',
            ])

            ->whereHas(
                'umkm',
                function ($query) {

                    $query
                        ->approved()
                        ->active();

                }
            )

            ->when(
                $search,
                function ($query) use ($search) {

                    $query->where(function ($query) use ($search) {

                        $query

                            ->where(
                                'name',
                                'like',
                                "%{$search}%"
                            )

                            ->orWhere(
                                'description',
                                'like',
                                "%{$search}%"
                            )

                            ->orWhereHas(
                                'umkm',
                                function ($query) use ($search) {

                                    $query->where(
                                        'business_name',
                                        'like',
                                        "%{$search}%"
                                    );

                                }
                            );

                    });

                }
            )

            ->when(
                $category,
                function ($query) use ($category) {

                    $query->whereHas(
                        'umkm.category',
                        function ($query) use ($category) {

                            $query->where(
                                'slug',
                                $category
                            );

                        }
                    );

                }
            )

            ->latest()

            ->paginate(
                self::PER_PAGE
            )

            ->withQueryString();
    }
}
