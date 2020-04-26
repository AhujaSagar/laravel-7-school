<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class schoolInfo extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'number',
        'email',
        'location',
        'trustee'
    ];

    public function addSchool($name,$email,$number,$location,$trustee){
        DB::table('school_infos')->insertGetId(
            ['name' => $name, 'email' => $email, 'number'=>$number, 'location'=>$location, 'trustee'=>$trustee]
        );
    return ;
    }

    public function show(){
        return DB::table('school_infos')->paginate(6);
    }

    public function del($id){
        return DB::table('school_infos')->where('id', $id)->delete();
    }

    public function change($id){
        return DB::table('school_infos')->where('id', $id)->first();
    }

    public function display($id){
        return DB::table('school_infos')
            ->join('courses_offered', 'school_infos.id', '=', 'courses_offered.school_id')
            ->join('courses_infos', 'courses_infos.id', '=', 'courses_offered.course_id')
            ->where('school_infos.id', $id)
            ->paginate(6);
    }

    public function upgrade($request,$id){
        $name = $request->get('name');
        $email = $request->get('email');
        $number = $request->get('number');
        $location = $request->get('location');
        $trustee = $request->get('trustee');
        if($name!=""){
            DB::table('school_infos')->where('id', $id)->update(['name' => $name]);
        }
        if($email!=""){
            DB::table('school_infos')->where('id', $id)->update(['email' => $email]);
        }
        if($number!=""){
            DB::table('school_infos')->where('id', $id)->update(['number' => $number]);
        }
        if($location!=""){
            DB::table('school_infos')->where('id', $id)->update(['location' => $location]);
        }
        if($trustee!=""){
            DB::table('school_infos')->where('id', $id)->update(['trustee' => $trustee]);
        }
    return ;
}
}