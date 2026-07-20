<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800">
                Manajemen Kategori
            </h2>

            <a href="{{ route('admin.categories.create') }}"
                class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700">
                + Tambah Kategori
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-6">

            @if(session('success'))
                <div class="mb-5 rounded-lg bg-green-100 border border-green-300 text-green-700 px-4 py-3">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-sm rounded-xl">

                <div class="p-6 border-b">

                    <form method="GET" class="flex gap-3">

                        <input
                            type="text"
                            name="search"
                            value="{{ $search }}"
                            placeholder="Cari kategori..."
                            class="w-full rounded-lg border-gray-300">

                        <button
                            class="px-5 bg-slate-800 text-white rounded-lg">
                            Cari
                        </button>

                    </form>

                </div>

                <table class="min-w-full">

                    <thead class="bg-gray-50">

                    <tr>

                        <th class="px-6 py-3 text-left">No</th>
                        <th class="px-6 py-3 text-left">Kategori</th>
                        <th class="px-6 py-3 text-left">Status</th>
                        <th class="px-6 py-3 text-center">Aksi</th>

                    </tr>

                    </thead>

                    <tbody>

                    @forelse($categories as $category)

                        <tr class="border-t">

                            <td class="px-6 py-4">
                                {{ $loop->iteration + ($categories->currentPage()-1) * $categories->perPage() }}
                            </td>

                            <td class="px-6 py-4">
                                <div class="font-semibold">
                                    {{ $category->name }}
                                </div>

                                <div class="text-sm text-gray-500">
                                    {{ $category->slug }}
                                </div>
                            </td>

                            <td class="px-6 py-4">

                                @if($category->is_active)

                                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs">
                                        Aktif
                                    </span>

                                @else

                                    <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs">
                                        Nonaktif
                                    </span>

                                @endif

                            </td>

                            <td class="px-6 py-4 text-center">

                                <div class="flex items-center justify-center gap-4">

                                    <a href="{{ route('admin.categories.edit', $category) }}"
                                    class="text-blue-600 hover:underline">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.categories.destroy', $category) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="text-red-600 hover:underline">
                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4" class="text-center py-8 text-gray-500">
                                Belum ada data kategori.
                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

                <div class="p-6 border-t">

                    {{ $categories->links() }}

                </div>

            </div>

        </div>
    </div>
</x-app-layout>
