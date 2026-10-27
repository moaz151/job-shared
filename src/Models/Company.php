<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
class Company extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'companies';

    protected $keyType = 'string';
    public $increment = false;

    protected $fillable = [
        'name',
        'address',
        'industry',
        'website',
        'owner_id',
    ];

    public function casts(): array
    {
        return [
            'deleted_at' => 'datetime',
        ];
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function JobVacancies()
    {
        return $this->hasMany(JobVacancy::class, 'company_id', 'id');
    }

    public function JobApplications()
    {
        return $this->hasManyThrough(JobApplication::class, JobVacancy::class, 'company_id', 'job_vacancy_id', 'id', 'id')->with('User');
    }

}
