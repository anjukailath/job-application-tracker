<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Interview extends Model
{
    protected $fillable = [
        'interview_date',
        'interview_type',
        'meeting_link',
        'interviewer_name',
        'notes',
        'feedback',
        'result',
    ];

    protected function casts(): array
    {
        return [
            'interview_date' => 'datetime',
        ];
    }

    public function jobApplication(): BelongsTo
    {
        return $this->belongsTo(JobApplication::class);
    }
}
