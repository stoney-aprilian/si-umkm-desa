<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Owner\StoreProductRequest;
use App\Http\Requests\Owner\UpdateProductRequest;
use App\Models\Product;
use App\Traits\BuildsUniqueSlug;
use App\Traits\HandlesImageUpload;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    use BuildsUniqueSlug;
    use HandlesImageUpload;



    /**
     * Default pagination size.
     */
    private const PER_PAGE = 10;




    /**
     * Display owner's products.
     */
    public function index(Request $request): View
    {
        $search = trim(
            $request->string('search')
        );



        $products = $this->ownerProducts($request)

            ->search($search)

            ->latest()

            ->paginate(self::PER_PAGE)

            ->withQueryString();



        return view(
            'owner.products.index',
            compact(
                'products',
                'search'
            )
        );
    }






    /**
     * Show create form.
     */
    public function create(): View
    {
        return view(
            'owner.products.create'
        );
    }






    /**
     * Store product.
     */
    public function store(
        StoreProductRequest $request
    ): RedirectResponse {

        Product::create(
            $this->payload($request)
        );



        return to_route(
            'owner.products.index'
        )
            ->with(
                'success',
                'Produk berhasil ditambahkan.'
            );
    }






    /**
     * Show edit form.
     */
    public function edit(
        Request $request,
        string $product
    ): View {

        $product = $this->findProduct(
            $request,
            $product
        );



        return view(
            'owner.products.edit',
            compact('product')
        );
    }






    /**
     * Update product.
     */
    public function update(
        UpdateProductRequest $request,
        string $product
    ): RedirectResponse {

        $product = $this->findProduct(
            $request,
            $product
        );



        $product->update(

            $this->payload(
                $request,
                $product
            )

        );



        return to_route(
            'owner.products.index'
        )
            ->with(
                'success',
                'Produk berhasil diperbarui.'
            );
    }






    /**
     * Delete product.
     */
    public function destroy(
        Request $request,
        string $product
    ): RedirectResponse {

        $product = $this->findProduct(
            $request,
            $product
        );



        $this->deleteImage(
            $product->image
        );



        $product->delete();



        return to_route(
            'owner.products.index'
        )
            ->with(
                'success',
                'Produk berhasil dihapus.'
            );
    }






    /**
     * Build product payload.
     */
    private function payload(
        StoreProductRequest|UpdateProductRequest $request,
        ?Product $product = null
    ): array {

        $data = $request->validated();



        $data['slug'] = $this->generateUniqueSlug(

            Product::query(),

            $data['name'],

            $product?->id

        );



        $data['image'] = $this->uploadImage(

            $request,

            'image',

            $product?->image,

            'products/images'

        );



        $this->ensureOwnerHasUmkm(
            $request
        );



        $data['umkm_id'] = $request
            ->user()
            ->umkm
            ->id;



        $data['is_active'] = $request->boolean(
            'is_active'
        );



        return $data;
    }






    /**
     * Get authenticated owner's products.
     */
    private function ownerProducts(
        Request $request
    ): HasMany {

        $this->ensureOwnerHasUmkm(
            $request
        );


        return $request
            ->user()
            ->umkm
            ->products();
    }






    /**
     * Find product belonging to owner.
     */
    private function findProduct(
        Request $request,
        string $slug
    ): Product {

        return $this->ownerProducts($request)

            ->where(
                'slug',
                $slug
            )

            ->firstOrFail();
    }






    /**
     * Ensure owner has UMKM profile.
     */
    private function ensureOwnerHasUmkm(
        Request $request
    ): void {

        abort_unless(
            $request->user()->umkm,
            403
        );

    }
}
