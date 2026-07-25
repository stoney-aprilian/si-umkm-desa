@extends('layouts.owner')

@section('title', 'Dashboard')

@section('content')

<div class="space-y-6">

    @include('owner.partials.dashboard-header')

    @include('owner.partials.statistics')

    <div class="grid gap-6 lg:grid-cols-3">

        <div class="space-y-6 lg:col-span-2">

            @include('owner.partials.profile-summary')

            @include('owner.partials.recent-products')

        </div>

        <div>

            @include('owner.partials.quick-actions')

        </div>

    </div>

</div>

@endsection
