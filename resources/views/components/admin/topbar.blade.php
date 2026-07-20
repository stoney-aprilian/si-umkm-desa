<header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8">

    <div>

        <h1 class="text-xl font-bold text-slate-800">

            @yield('title', 'Dashboard')

        </h1>

        <p class="text-sm text-slate-500">

            {{ now()->format('l, d F Y') }}

        </p>

    </div>

    <div class="flex items-center gap-4">

        <div class="text-right">

            <p class="font-semibold text-slate-700">

                {{ auth()->user()->name }}

            </p>

            <p class="text-sm text-slate-500">

                Administrator

            </p>

        </div>

        <div
            class="w-10 h-10 rounded-full bg-emerald-600 text-white flex items-center justify-center font-bold">

            {{ strtoupper(substr(auth()->user()->name,0,1)) }}

        </div>

    </div>

</header>
