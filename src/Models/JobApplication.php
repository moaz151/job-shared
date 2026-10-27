<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
class JobApplication extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'job_applications';

    protected $keyType = 'string';
    public $increment = false;

    protected $fillable = [
        'status',
        'aiGeneratedScore',
        'aiGeneratedFeedback',
        'user_id',
        'resume_id',
        'job_vacancy_id',
    ];

    public function casts(): array
    {
        return [
            'deleted_at' => 'datetime',
        ];
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Resume()
    {
        return $this->belongsTo(Resume::class);
    }

    public function JobVacancy()
    {
        return $this->belongsTo(JobVacancy::class, 'job_vacancy_id', 'id');
    }

}
