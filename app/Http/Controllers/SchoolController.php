<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\school;

class SchoolController extends Controller
{
    public function AddSchool()  
    {
        return view('admin.school.addschool');
    }
    public function PostAddSchool(Request $request)  
    {
        $data=new school();
        $data->school=$request->schoolname;
        $data->status=1;
        $data->save();
        $list=school::all();
        return redirect('add-school')->with('message','save school successfully');
    }

    public function schoolList()
    {
        $list=school::all();
        return view('admin.school.schoollist',['list'=>$list]);
    }
    public function deleteschool($id)
    {
        $school=school::find($id);
        $school->delete();
        return redirect('school-list');
    }

}
