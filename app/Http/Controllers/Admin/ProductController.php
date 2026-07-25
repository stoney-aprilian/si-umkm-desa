<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Product;
use App\Models\Umkm;
use App\Traits\BuildsUniqueSlug;
use App\Traits\HandlesImageUpload;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
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
     * Display a listing of products.
     */
    public function index(Request $request): View
    {
        $search = trim(
            $request->string('search')
        );



        $products = Product::query()

            ->with([
                'umkm:id,business_name',
            ])

            ->search($search)

            ->latest()

            ->paginate(self::PER_PAGE)

            ->withQueryString();





        $statistics = [

            'total' => Product::count(),


            'active' => Product::where(
                'is_active',
                true
            )->count(),


            'inactive' => Product::where(
                'is_active',
                false
            )->count(),


            'featured' => Product::where(
                'is_featured',
                true
            )->count(),

        ];





        return view(
            'admin.products.index',
            compact(
                'products',
                'search',
                'statistics'
            )
        );
    }








    /**
     * Show create form.
     */
    public function create(): View
    {
        return view(
            'admin.products.create',
            [
                'umkms' => $this->activeUmkms(),
            ]
        );
    }








    /**
     * Store product.
     */
    public function store(
        StoreProductRequest $request
    ): RedirectResponse {

        $data = $this->payload($request);



        /*
        |--------------------------------------------------------------------------
        | Default product state
        |--------------------------------------------------------------------------
        */

        $data['is_active'] = true;

        $data['is_featured'] = false;



        Product::create($data);




        return to_route('admin.products.index')

            ->with(
                'success',
                'Produk berhasil ditambahkan.'
            );
    }








    /**
     * Redirect show request.
     */
    public function show(
        Product $product
    ): RedirectResponse {

        return to_route(
            'admin.products.index'
        );

    }








    /**
     * Show edit form.
     */
    public function edit(
        Product $product
    ): View {

        return view(
            'admin.products.edit',
            [
                'product' => $product,

                'umkms' => $this->activeUmkms(),
            ]
        );
    }








    /**
     * Update product.
     */
    public function update(
        UpdateProductRequest $request,
        Product $product
    ): RedirectResponse {


        $product->update(

            $this->payload(
                $request,
                $product
            )

        );




        return to_route('admin.products.index')

            ->with(
                'success',
                'Produk berhasil diperbarui.'
            );
    }








    /**
     * Delete product.
     */
    public function destroy(
        Product $product
    ): RedirectResponse {


        $image = $product->image;



        $this->deleteImage(
            $image
        );



        $product->delete();





        return to_route('admin.products.index')

            ->with(
                'success',
                'Produk berhasil dihapus.'
            );
    }








    /**
     * Get selectable UMKM.
     */
    private function activeUmkms(): Collection
    {
        return Umkm::query()

            ->approved()

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
    private function payload(
        StoreProductRequest|UpdateProductRequest $request,
        ?Product $product = null
    ): array {

        $data = $request->validated();





        /*
        |--------------------------------------------------------------------------
        | Generate unique slug
        |--------------------------------------------------------------------------
        */

        $data['slug'] = $this->generateUniqueSlug(

            Product::query(),

            $data['name'],

            $product?->id

        );







        /*
        |--------------------------------------------------------------------------
        | Handle image upload
        |--------------------------------------------------------------------------
        */

        $data['image'] = $this->uploadImage(

            $request,

            'image',

            $product?->image,

            'products/images'

        );








        /*
        |--------------------------------------------------------------------------
        | Boolean fields
        |--------------------------------------------------------------------------
        */

        $data['is_featured'] = $request->boolean(
            'is_featured'
        );


        $data['is_active'] = $request->boolean(
            'is_active'
        );





        return $data;
    }
}
