@if (Session::has('success'))
    <div class="container-fluid">
        <div class="flex">
            <div class="w-full">
                <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
                    {{ Session::get('success') }}
                </div>
            </div>
        </div>
    </div>
@endif
