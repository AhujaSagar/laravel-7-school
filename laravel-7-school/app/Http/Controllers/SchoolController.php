<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\schoolInfo;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schoolModel= new schoolInfo();
        $school=$schoolModel->show();
        return view('school.index',compact('school'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('school.createSchool');
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
            'email'=>'required',
            'number'=>'required',
            'location'=>'required',
            'trustee'=>'required'
        ]);

            $name = $request->get('name');
            $email = $request->get('email');
            $number = $request->get('number');
            $location = $request->get('location');
            $trustee = $request->get('trustee');

            $school= new schoolInfo();
            $school->addSchool($name,$email,$number,$location,$trustee);
            return redirect('/school')->with('success', 'School added!');     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $schoolModel= new schoolInfo();
        $school=$schoolModel->display($id);
        return view('school.show', compact('school'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schoolModel= new schoolInfo();
        $school=$schoolModel->change($id);
        return view('school.edit', compact('school'));
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
        $schoolModel= new schoolInfo();
        $school=$schoolModel->upgrade($request, $id);
        return redirect('/school')->with('success', 'School updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schoolModel= new schoolInfo();
        $school=$schoolModel->del($id);
        return redirect('/school')->with('success', 'School deleted!');
    }
}
