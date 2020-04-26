<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\schoolInfos;

class courses_offered extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'id',
        'course_id',
        'school_id' 
    ];

    public function addCourses($school,$course){
        $schoolId= DB::table('school_infos')->select('id')->where('name', $school)->get();
        $courseId= DB::table('courses_infos')->select('id')->where('cname', $course)->get();
        DB::table('courses_offered')->insertGetId(
            ['course_id' => $courseId[0]->id, 'school_id' => $schoolId[0]->id]
        );
    return ;
    }

    public function show(){
        return DB::table('courses_offered')->paginate(8);
    }
}
