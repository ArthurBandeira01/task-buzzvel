@if (Session::has('error'))
    <div class="container-fluid">
        <div class="flex">
            <div class="w-full">
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                    {{ Session::get('error') }}
                </div>
            </div>
        </div>
    </div>
@endif
