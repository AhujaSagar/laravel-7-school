<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\coursesInfo;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courseModel= new coursesInfo();
        $course=$courseModel->show();
        return view('course.index',compact('course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'duration'=>'required',
            'professor'=>'required',
            'fees'=>'required',
        ]);

        $course = new coursesInfo([
            $name = $request->get('name'),
            $duration = $request->get('duration'),
            $professor = $request->get('professor'),
            $fees = $request->get('fees'),
        ]);
        $courseModel= new coursesInfo();
        $course=$courseModel->addCourse($name,$duration,$professor,$fees);
        return redirect('/course')->with('success', 'course added!');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $courseModel= new coursesInfo();
        $course=$courseModel->display($id);
        return view('course.show',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courseModel= new coursesInfo();
        $course=$courseModel->change($id);
        return view('course.edit', compact('course'));
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
        $courseModel= new coursesInfo();
        $course=$courseModel->upgrade($request, $id);    
        return redirect('/course')->with('success', 'Course updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $courseModel= new coursesInfo();
        $course=$courseModel->del($id);
        return redirect('/course')->with('success', 'course deleted!');
    }
}
