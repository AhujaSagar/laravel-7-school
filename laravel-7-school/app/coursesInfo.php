<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class coursesInfo extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'id',
        'cname',
        'duration',
        'professor',
        'fees'
    ];
    public function addCourse($name,$duration,$professor,$fees){
        DB::table('courses_infos')->insertGetId(
            ['cname' => $name, 'duration' => $duration, 'professor'=>$professor, 'fees'=>$fees]
        );
    return ;
    }

    public function show(){
        return DB::table('courses_infos')->paginate(6);
    }

    public function del($id){
        return DB::table('courses_infos')->where('id', $id)->delete();
    }

    public function change($id){
        return DB::table('courses_infos')->where('id', $id)->first();
    }

    public function display($id){
        return DB::table('courses_infos')
        ->join('courses_offered', 'courses_infos.id', '=', 'courses_offered.school_id')
        ->join('school_infos', 'school_infos.id', '=', 'courses_offered.course_id')
        ->where('courses_infos.id', $id)
        ->paginate(6);
    }

    public function upgrade($request,$id){
        $name = $request->get('name');
        $duration = $request->get('duration');
        $professor = $request->get('professor');
        $fees = $request->get('fees');
        if($name!=""){
            DB::table('courses_infos')->where('id', $id)->update(['cname' => $name]);
        }
        if($duration!=""){
            DB::table('courses_infos')->where('id', $id)->update(['duration' => $duration]);
        }
        if($professor!=""){
            DB::table('courses_infos')->where('id', $id)->update(['professor' => $professor]);
        }
        if($fees!=""){
            DB::table('courses_infos')->where('id', $id)->update(['fees' => $fees]);
        }
    return ;
}
}
