<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','comp_name','description',];

    /**
     * Company belongs to a user (Employer)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Company has many jobs
     */
    public function jobs()
    {
        return $this->hasMany(Job::class);

    }
}
