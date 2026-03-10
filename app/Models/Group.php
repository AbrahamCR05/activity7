<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    /**
     * A group has many students (users).
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * A group can have many courses (many-to-many).
     */
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_group');
    }
}
