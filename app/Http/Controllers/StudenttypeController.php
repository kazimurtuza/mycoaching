<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\classname;
use App\studenttype;

class StudenttypeController extends Controller
{
    public function studentTypelist() 
    {   
        $class=classname::all();
        $studentypes=DB::table('studenttypes')->join('classnames','studenttypes.class_id','=','classnames.id')->select('studenttypes.*','classnames.classname')->get();
        return view('admin.school.studentTypelist',['class'=>$class,'stutypelist'=>$studentypes]);
    }
    public function StudentTypeAdd(Request $request)
    {
        if($request->ajax())
        {
            $data=new studenttype();
            $data->class_id=$request->class_id;
            $data->student_type=$request->studenttype;
            $data->status=1;
            $data->save();

        }
        

    }


    public function showstudenttypelist()
    {

        $class=classname::all();
        $d="english";
        $studentypes=DB::table('studenttypes')->join('classnames','studenttypes.class_id','=','classnames.id')->select('studenttypes.*','classnames.classname')->get();
        return view('admin.school.showstudenttypetable',['class'=>$d,'stutypelist'=>$studentypes]); 
    }
}
