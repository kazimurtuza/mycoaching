
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
                    <h4 class="text-center font-weight-bold font-italic mt-3">update batch</h4>
                </div>
            </div>  
            {{-- {{route('post-add-class')}} --}}
        <form method="POST" action="{{route('Postbatch-edit')}}" enctype="multipart/form-data" autocomplete="on" class="form-inline">
            @csrf
       
            <div class="form-group col-12 mb-3">
                <label for="class name" class="col-sm-3 col-form-label text-right">classname</label>
              <select class="form-control col-sm-9" name="classname" id="classname">
                  <option value="select">--select--</option>
                  @foreach ($classname as $classname)
              <option value="{{$batchdata->class_id}}" {{$classname->id==$batchdata->class_id ?'selected':' '}}>{{$classname->classname}}</option>
                  @endforeach
              </select>

                @error('classname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
            </div>                             
            <div class="form-group col-12 mb-3">
                <label for="class name" class="col-sm-3 col-form-label text-right">add batch</label>
                <input id="addbatch" type="text" class="col-sm-9 form-control @error('addbatch') is-invalid @enderror" name="batch_name" value="{{$batchdata->batch_name}}" placeholder="addbatch" required autofocus>

                @error('addbatch')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
            </div>                             
               
                <div class="form-group col-12 mb-3">
                    <label for="class name" class="col-sm-3 col-form-label text-right">batch capacity</label>
                <input id="capacity" type="text" class="col-sm-9 form-control @error('capacity') is-invalid @enderror" name="capacity" 
                value="{{$batchdata->capacity}}" placeholder="capacity" required autofocus>

                    @error('capacity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>

            <input type="hidden" name="id"  value="{{$batchdata->id}}">

                <div class="form-group col-12 mb-3">
                    <label class="col-sm-3"></label>
                    <button type="submit" class="col-sm-9 btn btn-block my-btn-submit">update</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection