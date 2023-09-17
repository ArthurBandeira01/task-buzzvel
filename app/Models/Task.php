<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tasks';
    protected $fillable = [
        'taskId',
        'attachmentFileId',
        'title',
        'description',
        'user',
        'completed'
    ];

    public function attachmentFile()
    {
        return $this->belongsTo(AttachmentFile::class, 'attachmentFileId', 'attachmentFileId');
    }
}
