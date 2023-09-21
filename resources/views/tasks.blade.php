@extends('master')
@section('content')
<div class="flex flex-col justify-center items-center">
    <h1 class="text-3xl text-center mt-5 mb-8">
        Hi there <i class="far fa-laugh"></i>
    </h1>
    <p>Welcome to the <b>Task Buzzvel</b></p>
    <p>Create, edit, update and delete daily tasks as you wish!</p>
    <div class="form-create-task mt-8 mb-8">
        @include('form-task')
    </div>
    <div class="tasks-list mt-4 mb-4">
        @include('flash-message')
        <div class="overflow-x-auto">
            <table class="min-w-full shadow-md">
                <thead class="text-center">
                  <tr class="text-center p-5">
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">User</th>
                    <th class="px-4 py-2">Created at</th>
                    <th class="px-4 py-2">Updated at</th>
                    <th class="px-4 py-2">Completed</th>
                    <th class="px-4 py-2">Actions</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($tasks as $task)
                    <tr class="">
                        <td class="text-center px-6 py-3">{{$task->taskId}}</td>
                        <td class="text-right px-6 py-3">{{$task->title}}</td>
                        <td class="text-right px-6 py-3">{{$task->user}}</td>
                        <td class="text-center px-6 py-3">{{formatDate($task->created_at)}}</td>
                        <td class="text-center px-6 py-3">{{formatDate($task->updated_at)}}</td>
                        <td class="text-center px-6 py-3">
                            @if($task->completed === 1)
                                <span class="badge text-green-500 rounded p-1 w-50">Yes</span>
                            @else
                                <span class="badge text-red-500 rounded p-1 w-50">No</span>
                            @endif
                        </td>
                        <td class="text-center flex px-6 py-3">
                            <a class="text-xl" href="{{URL::asset('attachmentFile/' . $task->attachmentFile->attachmentFile)}}" target="_blank"><i class="fas fa-image"></i></a>
                            <div class="text-xl cursor-pointer ml-4" onclick="seeTask('{{json_encode($task)}}')"><i class="fas fa-eye text-yellow-500"></i></div>
                            <a class="text-xl ml-4" href="{{route('tasks.show', ['task' => $task->taskId])}}"><i class="fas fa-edit text-blue-500"></i></a>
                            <a class="text-xl ml-4" href="{{route('tasks.destroy', ['task' => $task->taskId])}}">
                                <form method="POST" action="{{ route('tasks.destroy', ['task' => $task->taskId]) }}" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash text-red-500"></i></button>
                                </form>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="text-end mt-4 teste">
        {{ $tasks->links() }}
    </div>
</div>
@endsection
@section('script')
    <script>
        function seeTask(taskData) {
            let task = JSON.parse(taskData);
            let createdTask = moment(task.created_at).format('MM/DD/YYYY');
            Swal.fire({
                html: '<div class="text-left mt-4"' +
                    '<p class="mt-4">ID: ' + task.taskId + '</p>' +
                    '<p class="mt-4">Title: ' + task.title + '</p>' +
                    '<p class="mt-4">User: ' + task.user + '</p>' +
                    '<p class="mt-4">Description: ' + task.description + '</p>' +
                    '<p class="mt-4">Create: ' + createdTask + '</p>' +
                    '</div>',
                showCloseButton: true,
                confirmButtonText: 'To back',
                confirmButtonAriaLabel: 'To back'
            });
        }
    </script>
@endsection
