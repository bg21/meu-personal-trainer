<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentProgressPhoto extends Model
{
    protected $fillable = [
        'student_progress_id', 'photo_path', 'type'
    ];

    public function studentProgress(): BelongsTo
    {
        return $this->belongsTo(StudentProgress::class);
    }
}
