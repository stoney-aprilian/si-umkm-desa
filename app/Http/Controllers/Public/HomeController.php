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
     * Number of featured UMKM displayed.
     */
    private const FEATURED_UMKM = 6;

    /**
     * Number of featured products displayed.
     */
    private const FEATURED_PRODUCT = 8;

    /**
     * Display the landing page.
     */
    public function index(): View
    {
        return view('public.home', [
            'statistics'      => $this->statistics(),
            'categories'      => $this->categories(),
            'featuredUmkms'   => $this->featuredUmkms(),
            'featuredProducts'=> $this->featuredProducts(),
        ]);
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
                ->whereHas('umkm', fn ($query) => $query->approved()->active())
                ->count(),

            'categories' => Category::active()
                ->count(),
        ];
    }

    /**
     * Get active categories.
     */
    private function categories(): Collection
    {
        return Category::active()
            ->select([
                'id',
                'name',
                'slug',
            ])
            ->orderBy('name')
            ->get();
    }

    /**
     * Get featured UMKM.
     */
    private function featuredUmkms(): Collection
    {
        return Umkm::approved()
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
            ->take(self::FEATURED_UMKM)
            ->get();
    }

    /**
     * Get featured products.
     */
    private function featuredProducts(): Collection
    {
        return Product::featured()
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
            ->whereHas('umkm', fn ($query) => $query->approved()->active())
            ->latest()
            ->take(self::FEATURED_PRODUCT)
            ->get();
    }
}
