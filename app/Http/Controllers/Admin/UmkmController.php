<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Umkm\StoreUmkmRequest;
use App\Http\Requests\Umkm\UpdateUmkmRequest;
use App\Models\Category;
use App\Models\Umkm;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\View\View;

class UmkmController extends Controller
{
    /**
     * Default pagination size.
     */
    private const PER_PAGE = 10;

    /**
     * Display a listing of the UMKM.
     */
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

        return view('admin.umkms.index', compact(
            'umkms',
            'search'
        ));
    }

    /**
     * Show the form for creating a new UMKM.
     */
    public function create(): View
    {
        $categories = $this->activeCategories();
        $owners = $this->owners();

        return view(
            'admin.umkms.create',
            compact(
                'categories',
                'owners'
            )
        );
    }

    /**
     * Store a newly created UMKM.
     */
    public function store(StoreUmkmRequest $request): RedirectResponse
    {
        Umkm::create(
            $this->payload($request)
        );

        return to_route('admin.umkms.index')
            ->with(
                'success',
                'UMKM berhasil ditambahkan.'
            );
    }

    /**
     * Redirect show request.
     */
    public function show(Umkm $umkm): RedirectResponse
    {
        return to_route('admin.umkms.index');
    }

    /**
     * Show the form for editing the specified UMKM.
     */
    public function edit(Umkm $umkm): View
    {
        $categories = $this->activeCategories();
        $owners = $this->owners();

        return view(
            'admin.umkms.edit',
            compact(
                'umkm',
                'categories',
                'owners'
            )
        );
    }

    /**
     * Update the specified UMKM.
     */
    public function update(
        UpdateUmkmRequest $request,
        Umkm $umkm
    ): RedirectResponse {
        $umkm->update(
            $this->payload($request)
        );

        return to_route('admin.umkms.index')
            ->with(
                'success',
                'UMKM berhasil diperbarui.'
            );
    }

    /**
     * Remove the specified UMKM.
     */
    public function destroy(Umkm $umkm): RedirectResponse
    {
        $umkm->delete();

        return to_route('admin.umkms.index')
            ->with(
                'success',
                'UMKM berhasil dihapus.'
            );
    }

    /**
     * Get active categories.
     */
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

    /**
     * Get owner accounts.
     */
    private function owners(): Collection
    {
        return User::query()
            ->select([
                'id',
                'name',
            ])
            ->where('role', 'owner')
            ->orderBy('name')
            ->get();
    }

    /**
     * Build UMKM payload.
     */
    private function payload(FormRequest $request): array
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['business_name']);

        $data['is_active'] = $request->boolean('is_active');

        return $data;
    }
}
