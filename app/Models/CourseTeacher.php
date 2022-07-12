<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseTeacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'user_id',
        'status',
    ];

    protected $primaryKey = 'id';

    protected $table = 'course_teachers';
}
