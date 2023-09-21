<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\AttachmentFile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
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

        $fileName = $this->checkFile($inputs['attachmentFile']);

        $attachmentFile = AttachmentFile::create([
            'attachmentFile' => $fileName,
        ]);

        $task = Task::create([
            'attachmentFileId' => $attachmentFile->id,
            'title' => $inputs['title'],
            'user' => $inputs['user'],
            'description' => $inputs['description'],
            'completed' => $completed
        ]);

        return redirect()->route('tasks.index');
    }

    public function show($id)
    {
        $task = Task::where('taskId', $id)->first();

        return view('show', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $inputs = $request->all();

        $completed = (isset($inputs['completed'])) ? 1 : 0;

        $fileName = $this->checkFile($inputs['attachmentFile']);

        $attachmentFile = AttachmentFile::where('attachmentFileId', $inputs['attachmentFileId'])->update([
            'attachmentFile' => $fileName,
        ]);

        $data = [
            'attachmentFileId' => $attachmentFile,
            'title' => $inputs['title'],
            'user' => $inputs['user'],
            'description' => $inputs['description'],
            'completed' => $completed
        ];

        Task::where('taskId', $id)->update($data);

        return redirect()->route('tasks.index')->with('success', 'Task updated sucessfully!');
    }

    public function destroy($id)
    {
        $task = Task::where('taskId', $id)->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

    public function checkFile($file)
    {
        $originaName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

        $fileName = $originaName.date('ymdHms').'.'.$file->extension();

        $file->move(public_path('attachmentFile'), $fileName);

        return $fileName;
    }
}
