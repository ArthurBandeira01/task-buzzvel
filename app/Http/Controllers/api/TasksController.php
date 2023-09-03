<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\AttachmentFile;
use Illuminate\Support\Str;

class TasksController extends Controller
{

    public function index()
    {
        $tasks = Task::orderby('taskId', 'desc')->paginate(12);

        return view('tasks', ['tasks' => $tasks]);
    }

    public function store(TaskRequest $request)
    {
        $inputs = $request->all();

        $completed = (isset($inputs['completed'])) ? 1 : 0;

        $originaName = pathinfo($inputs['attachmentFile']->getClientOriginalName(), PATHINFO_FILENAME);

        $fileName = $originaName.date('ymdHms').'.'.$inputs['attachmentFile']->extension();

        $inputs['attachmentFile']->move(public_path('attachmentFile'), $fileName);

        $attachmentFile = AttachmentFile::create([
            'attachmentFile' => $inputs['attachmentFile'],
        ]);

        $task = Task::create([
            'attachmentFileId' => $attachmentFile->id,
            'title' => $inputs['title'],
            'user' => $inputs['user'],
            'description' => $inputs['description'],
            'completed' => $completed
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

    public function show(string $task)
    {

    }

    public function edit(string $task)
    {
        $product = Task::findOrFail($task);

        return view('tasks.edit', compact('task'));
    }


    public function update(TaskRequest $request, string $task)
    {

    }

    public function destroy(string $task)
    {
        $task = Task::findOrFail($task);

        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
