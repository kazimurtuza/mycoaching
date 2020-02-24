
@extends('admin.master')
@section('content')
<!--Content Start-->
<section class="container-fluid">
    <div class="row content registraion-form">
        <div class="col-12 pl-0 pr-0">

     @if(Session::get('message'))
            {{session::get('message')}}
     @endif

            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">add school</h4>
                </div>
            </div>  
        <form method="POST" action="{{route('post-add-school')}}" enctype="multipart/form-data" autocomplete="on" class="form-inline">
            @csrf

                <div class="form-group col-12 mb-3">
                    <label for="school name" class="col-sm-3 col-form-label text-right">school name</label>
                    <input id="schoolname" type="text" class="col-sm-9 form-control @error('schoolname') is-invalid @enderror" name="schoolname" value="" placeholder="schoolname" required autofocus>

                    @error('schoolname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>


            {{-- <input type="hidden" schoolname="id" value="{{$user->id}}"> --}}

             

                <div class="form-group col-12 mb-3">
                    <label class="col-sm-3"></label>
                    <button type="submit" class="col-sm-9 btn btn-block my-btn-submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection