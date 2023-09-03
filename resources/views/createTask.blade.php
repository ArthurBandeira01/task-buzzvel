@extends('master')
@section('content')
<div class="flex flex-col justify-center items-center">
    <h1 class="text-3xl text-center mt-5 mb-8">
        Hi there <i class="far fa-laugh"></i>
    </h1>
    <p>Welcome to the <b>Task Buzzvel</b></p>
    <p>Create, edit, update and delete daily tasks as you wish</p>

    <div class="form-create-task mt-8 mb-8">
        <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" href="{{route('createTask')}}">
            <i class="fas fa-plus"></i> Create Task
        </a>
    </div>
    <div class="tasks-list mt-4 mb-4">

    </div>
    <div class="text-end mt-4 teste">
        {{ $tasks->links() }}
    </div>
</div>
@endsection
