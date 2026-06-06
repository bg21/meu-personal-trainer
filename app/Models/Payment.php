<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable = [
        'financial_plan_id', 'student_id', 'tenant_id', 'amount', 'due_date', 'paid_at', 'status', 'payment_method'
    ];

    protected $casts = [
        'due_date' => 'date',
        'paid_at' => 'date',
    ];

    public function financialPlan(): BelongsTo
    {
        return $this->belongsTo(FinancialPlan::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }
}
