@extends('layouts.owner')

@section('title', 'Profil UMKM')

@section('content')

<div class="space-y-6">

    <x-ui.page-header
        title="Profil UMKM"
        description="Kelola informasi UMKM yang akan ditampilkan kepada masyarakat." />

    <x-ui.card>

        <form
            action="{{ route('owner.profile.update') }}"
            method="POST"
            enctype="multipart/form-data"
            class="space-y-6">

            @csrf
            @method('PUT')

            @include('owner.profile._form')

            <x-ui.form-actions>

                <x-ui.button type="submit">

                    Simpan Perubahan

                </x-ui.button>

            </x-ui.form-actions>

        </form>

    </x-ui.card>

</div>

@endsection
