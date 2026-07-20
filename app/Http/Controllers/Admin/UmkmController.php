<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUmkmRequest;
use App\Http\Requests\UpdateUmkmRequest;
use App\Models\Category;
use App\Models\Umkm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Umkm::query()->with(['category', 'user']);

        if ($request->filled('search')) {
            $query->where('business_name', 'like', '%' . $request->search . '%');
        }

        $umkms = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.umkms.index', compact('umkms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('is_active', true)
            ->orderBy('name')
            ->get();

        $owners = User::where('role', 'owner')
            ->orderBy('name')
            ->get();

        return view('admin.umkms.create', compact(
            'categories',
            'owners'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUmkmRequest $request)
    {
        Umkm::create([
            'user_id'       => $request->user_id,
            'category_id'   => $request->category_id,
            'business_name' => $request->business_name,
            'slug'          => Str::slug($request->business_name),
            'description'   => $request->description,
            'phone'         => $request->phone,
            'address'       => $request->address,
            'village'       => $request->village,
            'district'      => $request->district,
            'regency'       => $request->regency,
            'maps_url'      => $request->maps_url,
            'status'        => $request->status,
            'is_active'     => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('admin.umkms.index')
            ->with('success', 'UMKM berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Umkm $umkm)
    {
        return redirect()->route('admin.umkms.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Umkm $umkm)
    {
        $categories = Category::where('is_active', true)
            ->orderBy('name')
            ->get();

        $owners = User::where('role', 'owner')
            ->orderBy('name')
            ->get();

        return view('admin.umkms.edit', compact(
            'umkm',
            'categories',
            'owners'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUmkmRequest $request, Umkm $umkm)
    {
        $umkm->update([
            'user_id'       => $request->user_id,
            'category_id'   => $request->category_id,
            'business_name' => $request->business_name,
            'slug'          => Str::slug($request->business_name),
            'description'   => $request->description,
            'phone'         => $request->phone,
            'address'       => $request->address,
            'village'       => $request->village,
            'district'      => $request->district,
            'regency'       => $request->regency,
            'maps_url'      => $request->maps_url,
            'status'        => $request->status,
            'is_active'     => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('admin.umkms.index')
            ->with('success', 'UMKM berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Umkm $umkm)
    {
        $umkm->delete();

        return redirect()
            ->route('admin.umkms.index')
            ->with('success', 'UMKM berhasil dihapus.');
    }
}
