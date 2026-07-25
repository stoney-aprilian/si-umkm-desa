<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display owner dashboard.
     */
    public function index()
    {
        $owner = Auth::user()->load([
            'umkm.category',
            'umkm.products' => fn ($query) => $query->latest(),
        ]);

        $umkm = $owner->umkm;

        $products = $umkm?->products ?? collect();

        return view('owner.dashboard', [
            'owner' => $owner,
            'umkm' => $umkm,

            'stats' => [
                'products' => $products->count(),
                'active_products' => $products->where('is_active', true)->count(),
                'inactive_products' => $products->where('is_active', false)->count(),
                'status' => $umkm?->status,
                'category' => $umkm?->category?->name,
                'joined_at' => optional($umkm?->created_at)->format('d M Y'),
            ],

            'recentProducts' => $products->take(5),
        ]);
    }
}
