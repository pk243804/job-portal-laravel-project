<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = ['job_id','user_id','resume','status',];

    /**
     * Application belongs to a job
     */
    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    /**
     * Application belongs to a user (Job Seeker)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
