<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Product;
use App\Models\Umkm;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Default pagination size.
     */
    private const PER_PAGE = 10;

    /**
     * Display a listing of the products.
     */
    public function index(Request $request): View
    {
        $search = trim($request->string('search'));

        $products = Product::query()
            ->with('umkm:id,business_name')
            ->search($search)
            ->latest()
            ->paginate(self::PER_PAGE)
            ->withQueryString();

        return view('admin.products.index', compact(
            'products',
            'search'
        ));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create(): View
    {
        $umkms = $this->activeUmkms();

        return view('admin.products.create', compact('umkms'));
    }

    /**
     * Store a newly created product.
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {
        Product::create(
            $this->payload($request)
        );

        return to_route('admin.products.index')
            ->with(
                'success',
                'Produk berhasil ditambahkan.'
            );
    }

    /**
     * Redirect show request.
     */
    public function show(Product $product): RedirectResponse
    {
        return to_route('admin.products.index');
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product): View
    {
        $umkms = $this->activeUmkms();

        return view(
            'admin.products.edit',
            compact(
                'product',
                'umkms'
            )
        );
    }

    /**
     * Update the specified product.
     */
    public function update(
        UpdateProductRequest $request,
        Product $product
    ): RedirectResponse {

        $product->update(
            $this->payload($request)
        );

        return to_route('admin.products.index')
            ->with(
                'success',
                'Produk berhasil diperbarui.'
            );
    }

    /**
     * Remove the specified product.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return to_route('admin.products.index')
            ->with(
                'success',
                'Produk berhasil dihapus.'
            );
    }

    /**
     * Get active UMKM list.
     */
    private function activeUmkms(): Collection
    {
        return Umkm::query()
            ->active()
            ->select([
                'id',
                'business_name',
            ])
            ->orderBy('business_name')
            ->get();
    }

    /**
     * Build product payload.
     */
    private function payload(FormRequest $request): array
    {
        $data = $request->validated();

        // Generate slug otomatis dari nama produk
        $data['slug'] = Str::slug($data['name']);

        // Toggle checkbox
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active'] = $request->boolean('is_active');

        return $data;
    }
}
