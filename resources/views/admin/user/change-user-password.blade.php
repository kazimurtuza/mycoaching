
@extends('admin.master')
@section('content')
<!--Content Start-->
<section class="container-fluid">
    <div class="row content registraion-form">
        <div class="col-12 pl-0 pr-0">

        @if(Session::get('error_message'))
                   <div class="alert alert-warning alert-dismissible fade show bg-danger text-center text-white" role="alert">
  <strong>error_message:</strong> {{Session::get('error_message')}}.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

                   @endif


            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">User Registration Form go</h4>
                </div>
            </div>
            <form method="POST" action="{{ route('update-user-password') }}" enctype="multipart/form-data" autocomplete="on" class="form-inline">
            @csrf

                
            <input type="text" name="id" value="{{$id}}">

                <div class="form-group col-12 mb-3">
                    <label for="password" class="col-sm-3 col-form-label text-right  @error('password') is-invalid @enderror">old Password</label>
                    <input id="password" type="password" class="col-sm-9 form-control" name="oldpassword" placeholder="Password" required>

                    @error('oldpassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>

                <div class="form-group col-12 mb-3">
                    <label for="newpassword" class="col-sm-3 col-form-label text-right @error('newpassword') is-invalid @enderror">new Password</label>
                    <input id="newpassword" type="password" class="col-sm-9 form-control" name="newpassword" placeholder="new Password" required>

                    @error('newpassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>

                <div class="form-group col-12 mb-3">
                    <label class="col-sm-3"></label>
                    <button type="submit" class="col-sm-9 btn btn-block my-btn-submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection