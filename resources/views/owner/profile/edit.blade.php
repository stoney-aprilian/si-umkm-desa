@extends('layouts.owner')

@section('title', 'Profil UMKM')

@section('content')

    <div class="mx-auto max-w-5xl space-y-8">

        {{-- ====================================================== --}}
        {{-- Page Header --}}
        {{-- ====================================================== --}}
        <x-ui.page-header title="Profil UMKM"
            subtitle="Kelola informasi UMKM yang akan ditampilkan kepada masyarakat melalui portal SI UMKM Desa." />





        {{-- ====================================================== --}}
        {{-- Form Card --}}
        {{-- ====================================================== --}}
        <x-ui.card padding="false" class="overflow-hidden">

            <form action="{{ route('owner.profile.update') }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')





                {{-- Form Content --}}
                <div class="p-6 md:p-8">

                    @include('owner.profile._form')

                </div>





                {{-- Footer Actions --}}
                <div
                    class="flex flex-col-reverse gap-3 border-t border-slate-200 bg-slate-50 px-6 py-5 md:flex-row md:items-center md:justify-end md:px-8">

                    <x-ui.button type="submit">

                        Simpan Perubahan

                    </x-ui.button>

                </div>

            </form>

        </x-ui.card>

    </div>

@endsection
