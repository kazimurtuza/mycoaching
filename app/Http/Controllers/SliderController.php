<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\slider;

class SliderController extends Controller
{
    public function addslide()
    {
        return view('admin.addslide');
    }
    public function saveslide(Request $request)
    {
        $this->imageValidate($request);
       $file=$request->file('img');
       $imgname=$file->getClientOriginalName();
       $imgfilepath='public/assets/slideimages/';
       $imgurl=$imgfilepath.$imgname;

       //////general way move file ///
       //$file->move($imgfilepath,$imgurl);
      //////general way move file end///

        // useing inventory move file

       Image::make($file)->resize(1400,570)->save($imgurl);

     // useing inventory move file end

     $data= new slider();
     $data->img=$imgurl;
     $data->slideTitle =$request->slideTitle;
     $data->slidedescription=$request->slideDescription;
     $data->status=$request->status;
     $data->save();
     return redirect('home')->with('message','slide add successfull');
    }

    public function imageValidate($request)
    {
        $this->validate($request,[
          
            'img'=>'required',
            'slideTitle'=>'required|string',
            'slideDescription'=>'required|string',
              'status'=>'required',
        ]);
    }

    public function manageslider()
    {
        $slidelist=slider::all();
        return view('admin.manage-slider',['slide'=>$slidelist]);
    }
    public function unpublishlist($id)
    {
        $data=slider::find($id);
        $data->status=0;
        $data->save();
        return redirect('manage-slider');

    }
    public function publishlist($id)
    {
        $data=slider::find($id);
        $data->status=1;
        $data->save();
        return redirect('manage-slider');

    }
    public function editslide($id)
    {
       $data=slider::find($id);
        return view('admin.editslide',['id'=>$data]);

    }
    public function updateslide(Request $request)
    {
        $data=slider::find($request->id);
        $data->slideTitle=$request->slideTitle;
        $data->slidedescription=$request->slideDescription;
        $data->status=$request->status;
        $data->save();

        if($request->file('img'))
        {
           $imgname=$this->imgsetup($request);
           $data=slider::find($request->id);
           $data->img=$imgname;
           $data->save();
           return redirect('manage-slider')->with('message',' slite edit is sucess');
        }
        else{
            return redirect('manage-slider')->with('message',' slite edit is sucess');
        }

       
         
           
        
      
       
    }

    public function deleteslide($id)
    {
        $data=slider::find($id);
        unlink($data->img);
        $data->delete();
        return redirect('manage-slider')->with('message',' slite deleted');

    }

    public function imgsetup($request)
    {   
        $data=slider::find($request->id);
     
             unlink($data->img);
            $file=$request->file('img');

        $name=$file->getClientOriginalName();
        $imgfilepath='public/assets/slideimages/';
        $imgeurl= $imgfilepath.$name;
        Image::make($file)->resize(1400,570)->save($imgeurl);
        return $imgeurl;

    }
    
    
}
