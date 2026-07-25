<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Umkm;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UmkmController extends Controller
{
    /**
     * Number of UMKM displayed per page.
     */
    private const PER_PAGE = 9;



    /**
     * Display UMKM catalogue.
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
            'public.umkms.index',
            [
                'umkms' => $this->umkms(
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
     * Display UMKM detail.
     */
    public function show(
        Umkm $umkm
    ): View {

        $umkm->load([

            'category:id,name,slug',

            'products' => function ($query) {

                $query

                    ->select([
                        'id',
                        'umkm_id',
                        'name',
                        'slug',
                        'price',
                        'is_featured',
                    ])

                    ->active()

                    ->latest();

            },

        ]);



        abort_unless(

            $umkm->status === 'approved'
            &&
            $umkm->is_active,

            404

        );



        return view(
            'public.umkms.show',
            compact('umkm')
        );
    }





    /**
     * Retrieve active categories.
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
     * Retrieve published UMKM list.
     */
    private function umkms(
        ?string $search,
        ?string $category
    ): LengthAwarePaginator {

        return Umkm::query()

            ->approved()

            ->active()

            ->select([
                'id',
                'category_id',
                'business_name',
                'slug',
                'description',
                'address',
                'village',
                'district',
                'regency',
            ])

            ->with([
                'category:id,name,slug',
            ])

            ->when(
                $search,
                function ($query) use ($search) {

                    $query->where(function ($query) use ($search) {

                        $query

                            ->where(
                                'business_name',
                                'like',
                                "%{$search}%"
                            )

                            ->orWhereHas(
                                'category',
                                function ($query) use ($search) {

                                    $query->where(
                                        'name',
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
                        'category',
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
