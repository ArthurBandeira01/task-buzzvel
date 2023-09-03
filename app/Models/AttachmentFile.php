<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttachmentFile extends Model
{
    use HasFactory;

    protected $table = 'attachment_files';
    protected $fillable = [
        'attachmentFileId',
        'attachmentFile'
    ];
}
