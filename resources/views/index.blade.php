@extends('master')
@section('content')
<div class="flex justify-center items-center h-screen">
    <div class="p-8 rounded shadow-lg">
        <h1 class="text-3xl text-center mt-3 mb-8">
            <i class="fas fa-tasks"></i> Task Buzzvel
        </h1>
        <div class="see-tasks mt-3 text-center">
            <a href="{{route('tasks.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-3 rounded">See Tasks</a>
        </div>
    </div>
</div>
@endsection
