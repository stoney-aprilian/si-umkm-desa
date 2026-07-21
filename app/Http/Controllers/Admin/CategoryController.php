<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Default pagination size.
     */
    private const PER_PAGE = 10;

    /**
     * Display a listing of the categories.
     */
    public function index(Request $request): View
    {
        $search = trim($request->string('search'));

        $categories = Category::query()
            ->search($search)
            ->latest()
            ->paginate(self::PER_PAGE)
            ->withQueryString();

        return view('admin.categories.index', compact(
            'categories',
            'search'
        ));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create(): View
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created category.
     */
    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        $data = $this->payload($request);

        // Kategori baru selalu aktif.
        $data['is_active'] = true;

        Category::create($data);

        return to_route('admin.categories.index')
            ->with(
                'success',
                'Kategori berhasil ditambahkan.'
            );
    }

    /**
     * Redirect show request.
     */
    public function show(Category $category): RedirectResponse
    {
        return to_route('admin.categories.index');
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(Category $category): View
    {
        return view(
            'admin.categories.edit',
            compact('category')
        );
    }

    /**
     * Update the specified category.
     */
    public function update(
        UpdateCategoryRequest $request,
        Category $category
    ): RedirectResponse {

        $data = $this->payload($request);

        // Status mengikuti pilihan admin.
        $data['is_active'] = $request->boolean('is_active');

        $category->update($data);

        return to_route('admin.categories.index')
            ->with(
                'success',
                'Kategori berhasil diperbarui.'
            );
    }

    /**
     * Remove the specified category.
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return to_route('admin.categories.index')
            ->with(
                'success',
                'Kategori berhasil dihapus.'
            );
    }

    /**
     * Build category payload.
     */
    private function payload(FormRequest $request): array
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['name']);

        return $data;
    }
}
