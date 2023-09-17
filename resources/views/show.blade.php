@extends('master')
@section('content')
<div class="flex flex-col justify-center items-center">
    <h1 class="text-3xl text-center mt-5 mb-8">
        <i class="fas fa-edit text-blue-500"></i> Edit your task
    </h1>
    <div class="form-create-task mt-8 mb-8">
        <form action="{{ route('tasks.update', ['task' => $task->taskId]) }}" method="post" enctype="multipart/form-data" class="flex flex-col bg-white shadow-md rounded mb-4 p-5" id="taskForm">
            @csrf
            @method('PUT')
            <input type="hidden" name="attachmentFileId" value="{{$task->attachmentFile->attachmentFileId}}">
            <div class="flex">
                <div class="w-max mb-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Title</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="text" value="{{$task->title}}" name="title" id="title" placeholder="Your title" minlength="5" required>
                </div>
                <div class="mb-3 ml-5">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="user">User</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="text" name="user" value="{{$task->user}}" id="user" placeholder="Username..." minlength="5" required>
                </div>
            </div>
            <div class="mb-3">
                <textarea class="p-2.5 w-full text-sm text-gray-900 rounded-lg border focus:outline-none" name="description" id="description"
                    minlength="10" required>{{$task->description}}</textarea>
            </div>

            <div class="mb-3">
                <input class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold
                file:bg-red-50 file:text-red-700 hover:file:bg-red-100 cursor-pointer" type="file" name="attachmentFile" id="attachmentFile" required>
            </div>

            <div class="flex justify-between mt-5">
                <div class="flex mt-3">
                    <input id="default-checkbox" type="checkbox" name="completed" {{ $task->completed === 1 ? 'checked' : '' }}
                    class="w-4 h-4 mt-1 text-blue-600 rounded focus:outline-none">
                    <label for="default-checkbox" class="ml-2 text-sm font-medium">Task completed</label>
                </div>
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Update Task</button>
            </div>
        </form>
    </div>
</div>
@endsection
