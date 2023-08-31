@extends('master')
@section('content')
<div class="flex flex-col justify-center items-center">
    <h1 class="text-3xl text-center mt-3 mb-8">
        Hi there <i class="far fa-laugh"></i>
    </h1>
    <p>Welcome to the <b>Task Buzzvel</b></p>
    <p>Create, edit, update and delete daily tasks as you wish</p>

    <div class="form-create-task">
        <form action="{{route('tasks.store')}}" method="post">
            @csrf
            <div class="grid grid-cols-2">
                <input type="text" name="taskCreate" id="taskCreat" placeholder="Create your task...">
                <button type="submit" class=""><i class="fas fa-plus"></i> Create Task</button>
            </div>
        </form>
    </div>
</div>
@endsection
