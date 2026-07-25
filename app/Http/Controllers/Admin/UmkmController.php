<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Umkm\StoreUmkmRequest;
use App\Http\Requests\Umkm\UpdateUmkmRequest;
use App\Models\Category;
use App\Models\Umkm;
use App\Models\User;
use App\Traits\BuildsUniqueSlug;
use App\Traits\HandlesImageUpload;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class UmkmController extends Controller
{
    use BuildsUniqueSlug;
    use HandlesImageUpload;


    private const PER_PAGE = 10;




    public function index(Request $request): View
    {
        $search = trim($request->string('search'));


        $umkms = Umkm::query()

            ->with([
                'category:id,name',
                'user:id,name',
            ])

            ->search($search)

            ->latest()

            ->paginate(self::PER_PAGE)

            ->withQueryString();



        $statistics = [

            'total' => Umkm::count(),

            'active' => Umkm::where(
                'is_active',
                true
            )->count(),

            'inactive' => Umkm::where(
                'is_active',
                false
            )->count(),

        ];



        return view(
            'admin.umkms.index',
            compact(
                'umkms',
                'search',
                'statistics'
            )
        );
    }





    public function create(): View
    {
        return view(
            'admin.umkms.create',
            [
                'categories' => $this->activeCategories(),
                'owners' => $this->owners(),
            ]
        );
    }





    public function store(
        StoreUmkmRequest $request
    ): RedirectResponse {

        $data = $this->payload($request);



        $data['status'] = 'pending';

        $data['is_active'] = false;



        Umkm::create($data);



        return to_route('admin.umkms.index')

            ->with(
                'success',
                'UMKM berhasil ditambahkan dan menunggu verifikasi.'
            );
    }





    public function show(
        Umkm $umkm
    ): RedirectResponse {

        return to_route('admin.umkms.index');

    }





    public function edit(
        Umkm $umkm
    ): View {

        return view(
            'admin.umkms.edit',
            [
                'umkm' => $umkm,

                'categories' => $this->activeCategories(),

                'owners' => $this->owners(),
            ]
        );
    }





    public function update(
        UpdateUmkmRequest $request,
        Umkm $umkm
    ): RedirectResponse {


        $umkm->update(

            $this->payload(
                $request,
                $umkm
            )

        );



        return to_route('admin.umkms.index')

            ->with(
                'success',
                'UMKM berhasil diperbarui.'
            );
    }





    public function destroy(
        Umkm $umkm
    ): RedirectResponse {


        if ($umkm->products()->exists()) {


            return back()

                ->with(
                    'error',
                    'UMKM tidak dapat dihapus karena masih memiliki produk.'
                );

        }



        $this->deleteImage(
            $umkm->logo
        );


        $this->deleteImage(
            $umkm->banner
        );



        $umkm->delete();



        return to_route('admin.umkms.index')

            ->with(
                'success',
                'UMKM berhasil dihapus.'
            );
    }





    private function activeCategories(): Collection
    {
        return Category::query()

            ->active()

            ->select([
                'id',
                'name',
            ])

            ->orderBy('name')

            ->get();
    }





    private function owners(): Collection
    {
        return User::query()

            ->select([
                'id',
                'name',
            ])

            ->where(
                'role',
                'owner'
            )

            ->orderBy('name')

            ->get();
    }





    private function payload(
        FormRequest $request,
        ?Umkm $umkm = null
    ): array {

        $data = $request->validated();



        $data['slug'] = $this->generateUniqueSlug(

            Umkm::query(),

            $data['business_name'],

            $umkm?->id

        );



        $data['logo'] = $this->uploadImage(

            $request,

            'logo',

            $umkm?->logo,

            'umkms/logo'

        );



        $data['banner'] = $this->uploadImage(

            $request,

            'banner',

            $umkm?->banner,

            'umkms/banner'

        );



        if ($umkm) {

            $data['is_active'] = $request->boolean(
                'is_active'
            );


            if ($request->filled('status')) {

                $data['status'] = $request->status;

            }

        }



        return $data;
    }
}
