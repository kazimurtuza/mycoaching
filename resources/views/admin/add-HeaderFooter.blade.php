
@extends('admin.master')
@section('content')
<!--Content Start-->
<section class="container-fluid">
    <div class="row content ">
        <div class="col-12 pl-0 pr-0">
            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">Add Home Page </h4>
                </div>
            </div>
            <form method="POST" action="{{ route('save-Header-footer') }}" enctype="multipart/form-data" autocomplete=" " class="form-inline">
            @csrf
                <div class="form-group col-12 mb-3">
                    <label for="name" class="col-sm-3 col-form-label text-right">Name</label>
                    <input id="name" type="text" class="col-sm-9 form-control @error('name')
                     is-invalid @enderror" name="name" value="{{ old('name')}}" placeholder="Organization Name"
                      required autofocus>

                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>

                <div class="form-group col-12 mb-3">
                    <label for="wonername" class="col-sm-3 col-form-label text-right">woner name</label>
                    <input id="wonername" type="text" class="col-sm-9 form-control @error('wonername')
                     is-invalid @enderror" name="wonername" value="" placeholder="woner name"required>

                    @error('wonername')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-group col-12 mb-3">
                    <label for="address" class="col-sm-3 col-form-label text-right">address</label>
                    <input id="address" type="text" class="col-sm-9 form-control @error('address')
                     is-invalid @enderror" name="address" value="" placeholder="address"required>

                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>

                <div class="form-group col-12 mb-3">
                    <label for="mobile" class="col-sm-3 col-form-label text-right">mobile</label>
                    <input id="mobile" type="text" class="col-sm-9 form-control @error('mobile') is-invalid @enderror"
                     name="mobile" value="{{ old('mobile') }}" placeholder="mobile" required>

                     @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-group col-12 mb-3">
                    <label for="copyright" class="col-sm-3 col-form-label text-right">copyright</label>
                    <input id="copyright" type="text" class="col-sm-9 form-control @error('copyright') is-invalid @enderror"
                     name="copyright" value="{{ old('copyright') }}" placeholder="copyright" required>

                     @error('copyright')
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