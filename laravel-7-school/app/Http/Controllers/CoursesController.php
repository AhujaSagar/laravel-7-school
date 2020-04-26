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
        $course= coursesInfo::all();
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
            'name' => $request->get('name'),
            'duration' => $request->get('duration'),
            'professor' => $request->get('professor'),
            'fees' => $request->get('fees'),
        ]);
        $course->save();
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
        $course = coursesInfo::find($id);
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
       $request->validate([

        ]);
        $i=0;
        $course = coursesInfo::find($id);
        if($request->get('name')!=""){
        $course->name = $request->get('name');
        $i++;
        }
        if($request->get('duration')!=""){
        $course->duration = $request->get('duration');
        $i++;
        }
        if($request->get('professor')!=""){
        $course->professor = $request->get('professor');
        $i++;
        }
        if($request->get('fees')!=""){
        $course->fees = $request->get('fees');
        $i++;
        }
        $course->save();

        return redirect('/course')->with('success', strval($i).' values updated!');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = coursesInfo::find($id);
        $course->delete();

        return redirect('/course')->with('success', 'course deleted!');
    }
}
