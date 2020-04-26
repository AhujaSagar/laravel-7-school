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
        $school= schoolInfo::paginate(1);
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

        $school = new schoolInfo([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'number' => $request->get('number'),
            'location' => $request->get('location'),
            'trustee' => $request->get('trustee')
        ]);
        $school->save();
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
        $school = schoolInfo::find($id);
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
       $request->validate([

        ]);
        $i=0;
        $school = schoolInfo::find($id);
        if($request->get('name')!=""){
        $school->name = $request->get('name');
        $i++;
        }
        if($request->get('email')!=""){
        $school->email = $request->get('email');
        $i++;
        }
        if($request->get('number')!=""){
        $school->number = $request->get('number');
        $i++;
        }
        if($request->get('location')!=""){
        $school->location = $request->get('location');
        $i++;
        }
        if($request->get('trustee')!=""){
        $school->trustee = $request->get('trustee');
        $i++;
        }
        $school->save();

        return redirect('/school')->with('success', strval($i).' values updated!');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $school = schoolInfo::find($id);
        $school->delete();

        return redirect('/school')->with('success', 'School deleted!');
    }
}
