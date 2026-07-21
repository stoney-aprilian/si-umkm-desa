<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Umkm;
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
    public function index(Request $request): View
    {
        $search = trim($request->string('search'));
        $category = trim($request->string('category'));

        return view('public.umkms.index', [
            'umkms' => $this->umkms($search, $category),
            'categories' => $this->categories(),
            'search' => $search,
            'category' => $category,
        ]);
    }

    /**
     * Display UMKM detail.
     */
    public function show(Umkm $umkm): View
    {
        abort_unless(
            $umkm->status === 'approved'
            && $umkm->is_active,
            404
        );

        $umkm->load([
            'category:id,name,slug',

            'products' => function ($query) {
                $query->select([
                        'id',
                        'umkm_id',
                        'name',
                        'slug',
                        'price',
                        'is_featured',
                    ])
                    ->where('is_active', true)
                    ->latest();
            },
        ]);

        return view('public.umkms.show', [
            'umkm' => $umkm,
        ]);
    }

    /**
     * Retrieve active categories.
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
     * Retrieve UMKM list.
     */
    private function umkms(
        ?string $search,
        ?string $category
    )
    {
        return Umkm::query()
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
                'status',
                'is_active',
            ])
            ->with([
                'category:id,name,slug',
            ])
            ->where('status', 'approved')
            ->where('is_active', true)

            ->when(
                $search,
                function ($query) use ($search) {

                    $query->where(function ($query) use ($search) {

                        $query->where(
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
            ->paginate(self::PER_PAGE)
            ->withQueryString();
    }
}
