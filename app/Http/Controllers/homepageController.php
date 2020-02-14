<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\HeaderFooter;
class homepageController extends Controller
{
    public function addHeaderFooter()
    {
        return view('admin.add-HeaderFooter');
    }
    public function saveHeaderFooter(Request $request)
    {
        $this->headerfooterValidation($request);
        // $this->validate($request,[
        //     'name'=>'required|string',
        //     'wonername'=>'required|string',
        //     'address'=>'required|string',
        //     'mobile'=>'required|min:13|max:13|string',
        //     'copyright'=>'required|string',
            
        // ]);
        
        $data=new HeaderFooter();
        $data['name']=$request->name;
        $data['wonername']=$request->wonername;
        $data['address']=$request->address;
        $data['mobile']=$request->mobile;
        $data['Copyright']=$request->copyright;
        $data->save();
        return redirect('home')->with('message','home update success');
       
    }
public function changeheaderFooter()
{
    $headerfooter=HeaderFooter::first();
    return view('admin.change-headerFooter')->with('headerfooter',$headerfooter);
}
public function updateheaderFooter(Request $request)
{
    $this->headerfooterValidation($request);
    $data=HeaderFooter::first();
    $data->name=$request->name;
    $data->wonername=$request->wonername;
    $data->address=$request->address;
    $data->mobile=$request->mobile;
    $data->Copyright=$request->copyright;
    $data->save();

    return redirect('/home');
    
}

protected function headerfooterValidation($request)
{
    $this->validate($request,[
        'name'=>'required|string',
        'wonername'=>'required|string',
        'address'=>'required|string',
        'mobile'=>'required|min:13|max:13|string',
        'copyright'=>'required|string',
        
    ]);

}

    
}
