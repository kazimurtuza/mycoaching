<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\school;
use App\classname;
use App\batch;

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

    // ///////////   class start///////////////
    
    public function Addclass()  
    {
        return view('admin.school.addclass');
    }
    public function PostAddclass(Request $request)  
    {
        $data=new classname();
        $data->classname=$request->classname;
        $data->status=1;
        $data->save();
        $list=classname::all();
        return redirect('add-class')->with('message','save class successfully');

        
    }

    public function classList()
    {
        $list=classname::all();
        return view('admin.school.classlist',['list'=>$list]);
    }
    public function deleteclass($id)
    {
        $school=classname::find($id);
        $school->delete();
        return redirect('class-list');
    }
    //    class end////////////////////////////////////


   //////////// add batch      /////////////

    public function AddBatch() 
    { 
        $allclassname=classname::all();
        return view('admin.school.addbatch',['classname'=>$allclassname]);
    }

    public function PostAddBatch(Request $request)
    {
        $input= new batch();
        $input->class_id=$request->class_id;
        $input->batch_name=$request->batch_name;
        $input->status=1;
        $input->save();
        return back()->with('message','successfully add batch');

    }
   //////////// end add batch      /////////////

}
