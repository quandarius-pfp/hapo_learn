<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Comment;
use App\Models\Lesson;
use App\Models\CourseTag;
use App\Models\Tag;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::getAllCourse();
        $teachers = User::getTeacher();
        $tags = Tag::getTag();
        return view('layouts.all-course', compact('courses', 'teachers', 'tags'));
    }

    public function search()
    {
        $keySearch = $_GET['key_search'];
        $courses = Course::getCourseSerch($keySearch);
        $teachers = User::getTeacher();
        $tags = Tag::getTag();

        return view ('layouts.search',compact('teachers', 'tags', 'courses', 'keySearch'));
    }

    public function sort()
    {
        $number_sort = $_GET['number_sort'];
        echo $number_sort;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
