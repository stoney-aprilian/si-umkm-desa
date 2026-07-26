@extends('layouts.owner')

@section('title', 'Dashboard')

@section('content')

    <div class="space-y-8">

        {{-- ====================================================== --}}
        {{-- Dashboard Header --}}
        {{-- ====================================================== --}}
        @include('owner.partials.dashboard-header')





        {{-- ====================================================== --}}
        {{-- Statistics --}}
        {{-- ====================================================== --}}
        @include('owner.partials.statistics')





        {{-- ====================================================== --}}
        {{-- Main Content --}}
        {{-- ====================================================== --}}
        <div class="grid gap-8 xl:grid-cols-3">

            {{-- Left Content --}}
            <div class="space-y-8 xl:col-span-2">

                @include('owner.partials.profile-summary')

                @include('owner.partials.recent-products')

            </div>





            {{-- Right Sidebar --}}
            <div class="space-y-8">

                @include('owner.partials.quick-actions')

            </div>

        </div>

    </div>

@endsection
