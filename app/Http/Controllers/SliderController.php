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
            'slideTitle'=>'required|string',
              'status'=>'required',
        ]);
    }
    
}
