<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentWorkoutPlan extends Model
{
    protected $fillable = [
        'student_id', 'workout_plan_id', 'tenant_id', 'start_date', 'expires_at', 'notes', 'is_active'
    ];

    protected $casts = [
        'start_date' => 'date',
        'expires_at' => 'date',
        'is_active' => 'boolean',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function workoutPlan(): BelongsTo
    {
        return $this->belongsTo(WorkoutPlan::class);
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }
}
