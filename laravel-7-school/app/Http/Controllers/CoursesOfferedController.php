<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\courses_offered;
use DB;

class CoursesOfferedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enroll= new courses_offered();
        $result=$enroll->show();
        return view('courses_offered.index',compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses_offered.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $enroll= new courses_offered();
        $school=$request->get('school');
        $course=$request->get('course');
        $enroll->addCourses($school,$course);
        return redirect('/courses_offered')->with('success', 'Course added!');    
    }
}
