@extends('layouts.admin')

@section('title', __('Profile'))

@section('content')

    <section class="space-y-6">

        {{-- Page Header --}}
        <div>

            <h1 class="text-3xl font-bold tracking-tight text-slate-900">
                {{ __('Profile') }}
            </h1>

            <p class="mt-2 text-sm text-slate-500">
                {{ __('Manage your account information, update your password, and configure your account settings.') }}
            </p>

        </div>

        {{-- Profile Information --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-8 shadow-sm">

            <div class="max-w-2xl">

                @include('profile.partials.update-profile-information-form')

            </div>

        </div>

        {{-- Update Password --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-8 shadow-sm">

            <div class="max-w-2xl">

                @include('profile.partials.update-password-form')

            </div>

        </div>

        {{-- Delete Account --}}
        <div class="rounded-2xl border border-red-200 bg-white p-8 shadow-sm">

            <div class="max-w-2xl">

                @include('profile.partials.delete-user-form')

            </div>

        </div>

    </section>

@endsection
