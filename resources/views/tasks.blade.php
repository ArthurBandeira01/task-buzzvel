@extends('master')
@section('content')
<div class="flex flex-col justify-center items-center">
    <h1 class="text-3xl text-center mt-5 mb-8">
        Hi there <i class="far fa-laugh"></i>
    </h1>
    <p>Welcome to the <b>Task Buzzvel</b></p>
    <p>Create, edit, update and delete daily tasks as you wish!</p>

    <div class="form-create-task mt-8 mb-8">
        <form action="{{route('tasks.store')}}" method="post" enctype="multipart/form-data" class="flex flex-col bg-white shadow-md rounded mb-4">
            @csrf
            <div class="flex">
                <div class="w-max mb-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Title</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="title" id="title" placeholder="Your title" required>
                </div>
                <div class="mb-3 ml-5">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="user">User</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="user" id="user" placeholder="Username..." required>
                </div>
            </div>
            <div class="mb-3">
                <textarea class="p-2.5 w-full text-sm text-gray-900 rounded-lg border focus:outline-none" name="description" id="" placeholder="Task description..." required></textarea>
            </div>

            <div class="mb-3">
                <input class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold
                file:bg-red-50 file:text-red-700 hover:file:bg-red-100 cursor-pointer" type="file" name="attachmentFile" id="attachmentFile">
            </div>

            <div class="flex justify-between mt-5">
                <div class="flex mt-3">
                    <input id="default-checkbox" type="checkbox" name="completed" value="1" class="w-4 h-4 mt-1 text-blue-600 rounded focus:outline-none">
                    <label for="default-checkbox" class="ml-2 text-sm font-medium">Task completed</label>
                </div>
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    <i class="fas fa-plus"></i> Create Task
                </button>
            </div>
        </form>
    </div>
    <div class="tasks-list mt-4 mb-4">
        <table class="table-auto">
            <thead class="text-center">
              <tr class="text-center">
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Title</th>
                <th class="px-4 py-2">User</th>
                <th class="px-4 py-2">Created at</th>
                <th class="px-4 py-2">Updated at</th>
                <th class="px-4 py-2">Completed</th>
                <th class="px-4 py-2" colspan="3">Actions</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td class="text-center">{{$task->taskId}}</td>
                    <td class="text-right">{{$task->title}}</td>
                    <td class="text-right">{{$task->user}}</td>
                    <td class="text-center">{{$task->created_At}}</td>
                    <td class="text-center">{{$task->updated_at}}</td>
                    <td class="text-center">
                        @if($task->completed === 1)
                            <span class="badge bg-green-500 text-white rounded p-1 w-50">Yes</span>
                        @else
                            <span class="badge bg-red-500 text-white rounded p-1 w-50">No</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <a class="" href="{{route('tasks.show', ['task' => $task->taskId])}}"><i class="fas fa-edit text-blue"></i></a>
                        <a class="" href="{{route('tasks.destroy', ['task' => $task->taskId])}}"><i class="fas fa-trash text-red"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-end mt-4 teste">
        {{ $tasks->links() }}
    </div>
</div>
@endsection
