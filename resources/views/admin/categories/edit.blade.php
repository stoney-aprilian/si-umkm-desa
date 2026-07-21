@extends('layouts.admin')

@section('title', 'Edit Kategori')

@section('content')

<div class="max-w-3xl">

    <x-ui.section-title
        title="Edit Kategori"
        subtitle="Perbarui data kategori." />

    <x-ui.card class="mt-6">

        <form
            action="{{ route('admin.categories.update', $category) }}"
            method="POST"
            class="space-y-6">

            @csrf
            @method('PUT')

            @include('admin.categories._form')

            <x-ui.form-actions>

                <x-ui.button
                    variant="secondary"
                    href="{{ route('admin.categories.index') }}">

                    Batal

                </x-ui.button>

                <x-ui.button type="submit">

                    Update

                </x-ui.button>

            </x-ui.form-actions>

        </form>

    </x-ui.card>

</div>

@endsection
