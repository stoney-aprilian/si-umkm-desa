@extends('layouts.admin')

@section('title', 'Edit Kategori')

@section('content')

<div class="mx-auto max-w-4xl">

    {{-- Page Header --}}
    <div class="mb-8">

        <x-ui.section-title
            title="Edit Kategori"
            subtitle="Perbarui informasi kategori agar data UMKM tetap terstruktur dan mudah dikelola." />

    </div>

    {{-- Form Card --}}
    <x-ui.card class="overflow-hidden">

        <form
            action="{{ route('admin.categories.update', $category) }}"
            method="POST"
            class="space-y-8">

            @csrf
            @method('PUT')

            {{-- Form Content --}}
            <div class="p-6 md:p-8">

                @include('admin.categories._form')

            </div>

            {{-- Footer Actions --}}
            <div class="flex flex-col-reverse gap-3 border-t border-gray-200 bg-gray-50 px-6 py-5 md:flex-row md:items-center md:justify-end md:px-8">

                <x-ui.button
                    variant="secondary"
                    href="{{ route('admin.categories.index') }}">

                    Kembali

                </x-ui.button>

                <x-ui.button
                    type="submit">

                    Perbarui Kategori

                </x-ui.button>

            </div>

        </form>

    </x-ui.card>

</div>

@endsection
