<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoboticsKit extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    /**
     * A robotics kit can be used in many courses.
     */
    public function courses()
    {
        return $this->hasMany(Course::class, 'kit_id');
    }
}
