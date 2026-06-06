<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StudentProgress extends Model
{
    protected $fillable = [
        'student_id', 'tenant_id', 'date', 'weight', 'body_fat_percentage', 'measurements', 'notes'
    ];

    protected $casts = [
        'date' => 'date',
        'measurements' => 'array',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    public function photos(): HasMany
    {
        return $this->hasMany(StudentProgressPhoto::class);
    }
}
