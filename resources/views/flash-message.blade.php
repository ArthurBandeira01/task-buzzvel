@if (session()->has('success'))
    <div class="border border-green-400 text-green-700 px-4 py-3 mb-5 rounded relative" role="alert">
        {{ session()->get('success') }}
    </div>
@endif

@if (Session::has('fail'))
<div class="border border-red-400 text-red-700 px-4 py-3 mb-5 rounded relative" role="alert">
    {{ session()->get('fail') }}
</div>
@endif
