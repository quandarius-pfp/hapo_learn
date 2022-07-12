<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'name_lesson',
        'slug_lesson',
        'video',
        'content',
        'time_lesson',
        'time_up',
        'status',
    ];

    protected $primaryKey = 'id';

    protected $table = 'lessons';

    public function courses()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'user_lessons', 'lesson_id','user_id');
    }

    public function programs()
    {
        return $this->hasMany(course::class, 'lesson_id');
    }   
}