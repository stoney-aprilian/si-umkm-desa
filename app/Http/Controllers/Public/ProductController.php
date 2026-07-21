<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
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
    public function index(Request $request): View
    {
        $search = trim($request->string('search'));
        $category = trim($request->string('category'));

        return view('public.products.index', [
            'products' => $this->products($search, $category),
            'categories' => $this->categories(),
            'search' => $search,
            'category' => $category,
        ]);
    }

    /**
     * Display product detail.
     */
    public function show(Product $product): View
    {
        abort_unless(
            $product->is_active
            && $product->umkm
            && $product->umkm->status === 'approved'
            && $product->umkm->is_active,
            404
        );

        $product->load([
            'umkm:id,business_name,slug,category_id',
            'umkm.category:id,name',
        ]);

        return view('public.products.show', [
            'product' => $product,
        ]);
    }

    /**
     * Active categories.
     */
    private function categories()
    {
        return Category::query()
            ->select([
                'id',
                'name',
                'slug',
            ])
            ->where('is_active', true)
            ->orderBy('name')
            ->get();
    }

    /**
     * Product listing.
     */
    private function products(
        ?string $search,
        ?string $category
    )
    {
        return Product::query()
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
            ->where('is_active', true)

            ->whereHas('umkm', function ($query) {
                $query->where('status', 'approved')
                    ->where('is_active', true);
            })

            ->when(
                $search,
                function ($query) use ($search) {
                    $query->where(function ($query) use ($search) {

                        $query->where(
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
            ->paginate(self::PER_PAGE)
            ->withQueryString();
    }
}
