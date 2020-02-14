@extends('admin.master')
@section('content')
@if(Session::get('message'))
<div class="alert alert-warning alert-dismissible fade show bg-success text-center text-white" role="alert">
<strong>message:</strong> {{Session::get('message')}}.
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

@endif

@if(Session::get('error_message'))
<div class="alert alert-warning alert-dismissible fade show bg-danger text-center text-white" role="alert">
<strong>error_message:</strong> {{Session::get('error_message')}}.
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

@endif
<!--Slider Start-->
<section class="container-fluid">
    <div class="row">
        <div class="col-12 pl-0 pr-0">
            <div class="owl-carousel">
               @foreach($slider as $slider)
                <div class="item">
                        <img src="{{$slider->img}}"  alt="">
                      
                        <div class="carousel-caption">
                            <h3> {{$slider->slidedescription}}</h3>
                            <p> {{$slider->slideTitle}}</p>
                          </div>

                   
                
                </div>      
                @endforeach   
        </div>
        </div>
    </div>
</section>
<!--Slider End-->





@endsection