<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Ramsey\Collection\Collection;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'course_name',
        'slug_course',
        'image',
        'description',
        'price',
        'status',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'course_tag', 'course_id', 'tag_id');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'course_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_course', 'course_id', 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'course_id');
    }


    public function scopeShowCourseAtHomeBlade($query)
    {
        return $query->limit(config('course.home_course_number'))->orderBy('id', config('course.sort_from_high_to_low'));
    }

    public function scopeShowCourseRandomAtHomeBlade($query)
    {
        return $query->inRandomOrder()->take(config('course.home_course_number_random'));
    }

    public function scopeGetAllCourse()
    {
        $courses = Course::withCount(['users', 'lessons'])->where('status',config('all-course.status'))->paginate(config('all-course.number_paginate'));

        $courses->map(function ($course) {
            $course->time_lesson = Lesson::where('course_id', $course->id)->pluck('time_lesson')->map(function ($time) {
                return Lesson::timeToMinutes($time);
            })->sum();
            return $course;
        });

        return $courses;
    }

    public function scopeGetCourseSerch($query, $key)
    {
        $courses = Course::withCount(['users', 'lessons'])->where('status',config('all-course.status'))->where('course_name', 'like', '%' . $key . '%')->paginate(config('all-course.number_paginate'));

        $courses->map(function ($course) {
            $course->time_lesson = Lesson::where('course_id', $course->id)->pluck('time_lesson')->map(function ($time) {
                return Lesson::timeToMinutes($time);
            })->sum();
            return $course;
        });

        return $courses;
    }
}
