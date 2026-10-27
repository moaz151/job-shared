<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
class JobVacancy extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'job_vacancies';

    protected $keyType = 'string';
    public $increment = false;

    protected $fillable = [
        'title',
        'description',
        'location',
        'salary',
        'type',
        'viewCount',
        'company_id',
        'category_id',
    ];

    public function casts(): array
    {
        return [
            'deleted_at' => 'datetime',
        ];
    }

    public function JobCategory()
    {
        return $this->belongsTo(JobCategory::class);
    }

    public function Company()
    {
        return $this->belongsTo(Company::class);
    }

    public function JobApplications()
    {
        return $this->hasMany(JobApplication::class, 'job_vacancy_id', 'id');
    }
}
