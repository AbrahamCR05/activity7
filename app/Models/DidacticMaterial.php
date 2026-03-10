<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DidacticMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'file_path',
        'type',
    ];

    /**
     * A didactic material belongs to a course.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
