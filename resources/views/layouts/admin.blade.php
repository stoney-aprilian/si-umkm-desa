<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-slate-100">

<div class="flex min-h-screen">

    @include('components.admin.sidebar')

    <div class="flex-1 flex flex-col">

        @include('components.admin.topbar')

        <main class="flex-1 p-8">

            @include('components.admin.flash-message')

            @yield('content')

        </main>

        @include('components.admin.footer')

    </div>

</div>

</body>

</html>
