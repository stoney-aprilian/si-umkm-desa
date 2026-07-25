<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Umkm;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;

class DashboardController extends Controller
{
    private const LATEST_LIMIT = 5;



    /**
     * Display admin dashboard.
     */
    public function index(): View
    {
        return view(
            'admin.dashboard',
            [
                'statistics' => $this->statistics(),

                'latestProducts' => $this->latestProducts(),

                'latestUmkms' => $this->latestUmkms(),
            ]
        );
    }





    /**
     * Dashboard statistics.
     */
    private function statistics(): array
    {
        return [

            'users' => User::count(),



            'owners' => User::where(
                'role',
                'owner'
            )->count(),



            'categories' => Category::active()
                ->count(),



            'umkms' => Umkm::count(),



            'pending_umkms' => Umkm::where(
                'status',
                'pending'
            )->count(),



            'approved_umkms' => Umkm::approved()
                ->count(),



            'published_umkms' => Umkm::approved()
                ->active()
                ->count(),



            'products' => Product::active()
                ->count(),



            'featured_products' => Product::featured()
                ->active()
                ->count(),

        ];
    }





    /**
     * Latest products.
     */
    private function latestProducts(): Collection
    {
        return Product::query()

            ->select([
                'id',
                'umkm_id',
                'name',
                'slug',
                'price',
                'is_active',
                'is_featured',
                'created_at',
            ])

            ->with([
                'umkm:id,business_name',
            ])

            ->latest()

            ->take(self::LATEST_LIMIT)

            ->get();
    }





    /**
     * Latest UMKM.
     */
    private function latestUmkms(): Collection
    {
        return Umkm::query()

            ->select([
                'id',
                'user_id',
                'category_id',
                'business_name',
                'slug',
                'status',
                'is_active',
                'created_at',
            ])

            ->with([
                'category:id,name',
                'user:id,name',
            ])

            ->latest()

            ->take(self::LATEST_LIMIT)

            ->get();
    }
}
