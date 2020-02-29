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


   ////////////  batch      /////////////

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
        $input->capacity=$request->capacity;
        $input->status=1;
        $input->save();
        return back()->with('message','successfully add batch');

    }


    public function BatchList()
    {
        $classname=classname::all();
        return view('admin.school.batchlist',['classname'=>$classname]);
    }

    public function BatchListByjquery(Request $request)
    {
        $batch=batch::where(['class_id'=> $request->id])->get();
        return view('admin.school.batchlist-by-jquery',['batch'=>$batch]);
      
    }

    public function BatchUnpublish(Request $request)
    {
        $data=batch::find($request->batch_id);
        $data->status=0;
        $data->save();
        $batch=batch::where(['class_id'=> $request->class_id])->get();
        return view('admin.school.batchlist-by-jquery',['batch'=>$batch])->with('message','batch unpublish successful');

    }
    public function BatchPublish(Request $request)
    {
        $data=batch::find($request->batch_id);
        $data->status=1;
        $data->save();
        $batch=batch::where(['class_id'=> $request->class_id])->get();
        return view('admin.school.batchlist-by-jquery',['batch'=>$batch])->with('message','batch unpublish successful');

    }
    public function BatchDelete(Request $request)
    {
        $data=batch::find($request->batch_id);
        $data->delete();
        $batch=batch::where(['class_id'=> $request->class_id])->get();
        return view('admin.school.batchlist-by-jquery',['batch'=>$batch])->with('message','batch delete successful');

    }
    public function BatchEdit($batch_id)
    {
        $data=batch::find($batch_id);
        $classname=classname::all();
        return view('admin.school.batch-edit',['batchdata'=>$data,'classname'=>$classname]);
    }

    public function PostBatchEdit(Request $request)
    {
        $update=batch::find($request->id);
        $update->class_id=$request->classname;
        $update->capacity=$request->capacity;
        $update->batch_name=$request->batch_name;
        $update->status=1;
        $update->save();
     
        return redirect('batch-list')->with('message','batch update successful');
      

    }
   //////////// end  batch      /////////////

}
