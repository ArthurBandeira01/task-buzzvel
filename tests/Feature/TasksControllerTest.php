<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;
use App\Models\AttachmentFile;

class TasksControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get(route('tasks.index'));

        $response->assertStatus(200);
        $response->assertViewIs('tasks');
    }

    // public function testStore()
    // {
    //     $attachmentFile = AttachmentFile::create([
    //         'attachmentFile' => 'file.txt',
    //     ]);

    //     $task = Task::create([
    //         'attachmentFileId' => $attachmentFile->id,
    //         'title' => 'Task test',
    //         'user' => 'User test',
    //         'description' => 'Description test',
    //         'completed' => 0
    //     ]);

    //     $response = $this->post(route('tasks.store'), $task->toArray());

    //     // $this->assertDatabaseHas('tasks', $task->toArray());

    //     $response->assertRedirect(route('tasks.index'));
    // }

    public function testDestroy()
    {
        $attachmentFile = AttachmentFile::create([
            'attachmentFile' => 'file.txt',
        ]);

        $task = Task::create([
            'attachmentFileId' => $attachmentFile->id,
            'title' => 'Task test',
            'user' => 'User test',
            'description' => 'Description test',
            'completed' => 0,
        ]);

        $response = $this->delete(route('tasks.destroy', ['task' => $task->id]));

        $this->assertDatabaseMissing('tasks', ['taskId' => $task->taskId]);

        $response->assertRedirect(route('tasks.index'));
    }
}
