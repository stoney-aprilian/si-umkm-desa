@extends('layouts.admin')

@section('title', 'Edit UMKM')


@section('content')

    <div class="mx-auto max-w-5xl">


        {{-- Page Header --}}
        <div class="mb-8">


            <x-ui.section-title title="Edit UMKM"
                subtitle="Perbarui informasi UMKM agar data yang tampil kepada masyarakat tetap akurat dan terbaru." />


        </div>





        {{-- Form Card --}}
        <x-ui.card class="overflow-hidden">


            <form action="{{ route('admin.umkms.update', $umkm) }}" method="POST" enctype="multipart/form-data"
                class="space-y-8">


                @csrf

                @method('PUT')





                {{-- Form Content --}}
                <div class="p-6 md:p-8">


                    @include('admin.umkms._form')


                </div>





                {{-- Footer Actions --}}
                <div
                    class="flex flex-col-reverse gap-3 border-t border-slate-200 bg-slate-50 px-6 py-5 md:flex-row md:items-center md:justify-end md:px-8">





                    <x-ui.button variant="secondary" href="{{ route('admin.umkms.index') }}">


                        Kembali


                    </x-ui.button>







                    <x-ui.button type="submit">


                        Perbarui UMKM


                    </x-ui.button>





                </div>



            </form>


        </x-ui.card>



    </div>


@endsection
