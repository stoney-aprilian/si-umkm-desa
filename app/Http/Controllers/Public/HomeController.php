<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Umkm;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Number of latest UMKM displayed.
     */
    private const LATEST_UMKM_LIMIT = 6;


    /**
     * Number of featured products displayed.
     */
    private const FEATURED_PRODUCT_LIMIT = 8;



    /**
     * Display landing page.
     */
    public function index(): View
    {
        return view(
            'public.home',
            [
                'statistics' => $this->statistics(),

                'categories' => $this->categories(),

                'latestUmkms' => $this->latestUmkms(),

                'featuredProducts' => $this->featuredProducts(),
            ]
        );
    }





    /**
     * Homepage statistics.
     */
    private function statistics(): array
    {
        return [

            'umkms' => Umkm::approved()
                ->active()
                ->count(),



            'products' => Product::active()

                ->whereHas(
                    'umkm',
                    fn ($query) => $query
                        ->approved()
                        ->active()
                )

                ->count(),



            'categories' => Category::active()
                ->count(),

        ];
    }





    /**
     * Get available categories.
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
     * Get latest published UMKM.
     */
    private function latestUmkms(): Collection
    {
        return Umkm::query()

            ->approved()

            ->active()

            ->select([
                'id',
                'category_id',
                'business_name',
                'slug',
                'address',
                'village',
                'district',
                'regency',
            ])

            ->with([
                'category:id,name',
            ])

            ->latest()

            ->take(
                self::LATEST_UMKM_LIMIT
            )

            ->get();
    }





    /**
     * Get featured products.
     */
    private function featuredProducts(): Collection
    {
        return Product::query()

            ->featured()

            ->active()

            ->select([
                'id',
                'umkm_id',
                'name',
                'slug',
                'price',
                'image',
                'is_featured',
            ])

            ->with([
                'umkm:id,business_name,slug',
            ])

            ->whereHas(
                'umkm',
                fn ($query) => $query
                    ->approved()
                    ->active()
            )

            ->latest()

            ->take(
                self::FEATURED_PRODUCT_LIMIT
            )

            ->get();
    }
}
