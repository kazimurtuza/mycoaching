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
                <div class="item"><img src="{{asset('public')}}/assets/images/img-1.jpg" alt=""></div>
                <div class="item"><img src="{{asset('public')}}/assets/images/img-2.jpg" alt=""></div>
                <div class="item"><img src="{{asset('public')}}/assets/images/img-3.jpg" alt=""></div>
                <div class="item"><img src="{{asset('public')}}/assets/images/img-4.jpg" alt=""></div>
                <div class="item"><img src="{{asset('public')}}/assets/images/img-5.jpg" alt=""></div>
                <div class="item"><img src="{{asset('public')}}/assets/images/img-6.jpg" alt=""></div>
                <div class="item"><img src="{{asset('public')}}/assets/images/img-7.jpg" alt=""></div>
                <div class="item"><img src="{{asset('public')}}/assets/images/img-8.jpg" alt=""></div>
            </div>
        </div>
    </div>
</section>
<!--Slider End-->
@endsection