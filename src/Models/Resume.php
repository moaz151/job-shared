<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
class Resume extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'resumes';

    protected $keyType = 'string';
    public $increment = false;

    protected $fillable = [
        'file_name',
        'file_url',
        'contact_details',
        'education',
        'summary',
        'skills',
        'experience',
        'user_id',
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

    public function JobApplication()
    {
        return $this->hasMany(JobApplication::class);
    }
}
