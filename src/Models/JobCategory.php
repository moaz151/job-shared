<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class JobCategory extends Model
{
    use HasFactory, HasUuids, SoftDeletes;
    protected $table = 'job_categories';

    protected $keyType = 'string';
    public $increment = false;

    protected $fillable = [
        'name',
    ];

    public function casts(): array
    {
        return [
            'deleted_at' => 'datetime',
        ];
    }

    public function JobVacancy()
    {
        return $this->hasMany(JobVacancy::class);
    }
}
