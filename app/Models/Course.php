<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_key',
        'title',
        'cover_image',
        'content',
        'kit_id',
    ];

    /**
     * A course belongs to a robotics kit.
     */
    public function roboticsKit()
    {
        return $this->belongsTo(RoboticsKit::class, 'kit_id');
    }

    /**
     * A course can belong to many groups (many-to-many).
     */
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'course_group');
    }

    /**
     * A course has many didactic materials.
     */
    public function didacticMaterials()
    {
        return $this->hasMany(DidacticMaterial::class);
    }
}
