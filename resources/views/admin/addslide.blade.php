
@extends('admin.master')
@section('content')

<section class="container-fluid">
    <div class="row content">
        <div class="col-md-8 offset-md-2 pl-0 pr-0">

         

            <div class="table-responsive p-1">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;margin:auto">
                   @if(Session::get('message'))
                   <div class="alert alert-warning alert-dismissible fade show bg-success text-center text-white" role="alert">
  <strong>message:</strong> {{Session::get('message')}}.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

                   @endif
                   <tr> <td colspan="3" style="background:rgb(235,247,227)">
                   <div id="preview">
<h3>Image Preview</h3>
                   <img style="width:350px;height:310px;margin-bottom:10px"src="{{asset('public')}}/assets/images/dslr.png" id="preview-image">
</div>
</td>
</tr>
                                   
                
                    <!-- Image Preview Before Upload using JavaScript -->


               






</div>
                   
                </table>
            </div>
        </div>
    </div>
</section>






<!--Content Start-->
<section class="container-fluid">
    <div class="row content ">
        <div class="col-12 pl-0 pr-0">
            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">Add Home Page </h4>
                </div>
            </div>
            
            <form method="POST" action="{{ route('save_slide') }}" enctype="multipart/form-data" autocomplete=" " class="form-inline">
            @csrf
     

      
                <div class="form-group col-12 mb-3">
                    <label for="img" class="col-sm-3 col-form-label text-right">address</label>
                    <input type="file" name="img"  onchange="previewImage(this);">

                
                </div>
                <div class="form-group col-12 mb-3">
                    <label for="slideTitle" class="col-sm-3 col-form-label text-right">slide Title</label>
                    <input id="slideTitle" type="text" class="col-sm-9 form-control @error('slideTitle') is-invalid @enderror"
                     name="slideTitle" value="{{ old('slideTitle') }}" placeholder="slideTitle" required>

                     @error('slideTitle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>

                <div class="form-group col-12 mb-3">
                    <label for="slideDescription" class="col-sm-3 col-form-label text-right">slideDescription</label>
                    <input id="slideDescription" type="text" class="col-sm-9 form-control @error('slideDescription') is-invalid @enderror"
                     name="slideDescription" value="{{ old('slideDescription') }}" placeholder="slide Description" required>

                     @error('slideDiscription')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
          
                <div class="form-group col-12 mb-3">
                    <label for="status" class="col-sm-3 col-form-label text-right">status</label>
                    <label for="status" class="col-sm-3 col-form-label text-right">publish</label>
                    <input type="radio" name="status" value="1" id="">
                    <label for="status" class="col-sm-3 col-form-label text-right">hidden</label>
                    <input type="radio" name="status" value="1" id="">
                     @error('status')
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

<script src="jquery-1.9.1.js"></script>
<script>
function previewImage(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#preview-image').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}
</script>

@endsection