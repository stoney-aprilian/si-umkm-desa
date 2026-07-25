<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Owner\UpdateProfileRequest;
use App\Models\Category;
use App\Models\Umkm;
use App\Traits\BuildsUniqueSlug;
use App\Traits\HandlesImageUpload;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    use BuildsUniqueSlug;
    use HandlesImageUpload;



    /**
     * Show profile form.
     */
    public function edit(
        Request $request
    ): View {

        $umkm = $this->ownerUmkm(
            $request
        );



        $categories = Category::query()

            ->active()

            ->select([
                'id',
                'name',
            ])

            ->orderBy('name')

            ->get();



        return view(
            'owner.profile.edit',
            compact(
                'umkm',
                'categories'
            )
        );
    }






    /**
     * Update profile.
     */
    public function update(
        UpdateProfileRequest $request
    ): RedirectResponse {

        $umkm = $this->ownerUmkm(
            $request
        );



        $umkm->update(

            $this->payload(
                $request,
                $umkm
            )

        );



        return back()

            ->with(
                'success',
                'Profil UMKM berhasil diperbarui.'
            );
    }






    /**
     * Build update payload.
     */
    private function payload(
        UpdateProfileRequest $request,
        Umkm $umkm
    ): array {

        $data = $request->validated();



        $data['slug'] = $this->generateUniqueSlug(

            Umkm::query(),

            $data['business_name'],

            $umkm->id

        );



        $data['logo'] = $this->uploadImage(

            $request,

            'logo',

            $umkm->logo,

            'umkms/logo'

        );



        $data['banner'] = $this->uploadImage(

            $request,

            'banner',

            $umkm->banner,

            'umkms/banner'

        );



        return $data;
    }






    /**
     * Get authenticated owner's UMKM.
     */
    private function ownerUmkm(
        Request $request
    ): Umkm {

        $umkm = $request
            ->user()
            ->umkm;



        abort_unless(
            $umkm,
            403
        );



        return $umkm;
    }
}
