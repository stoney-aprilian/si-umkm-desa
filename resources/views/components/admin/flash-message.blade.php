@if(session('success'))
    <div class="mb-5 rounded-lg border border-green-200 bg-green-50 px-5 py-4 text-green-700">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="mb-5 rounded-lg border border-red-200 bg-red-50 px-5 py-4 text-red-700">
        {{ session('error') }}
    </div>
@endif
