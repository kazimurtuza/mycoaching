@extends('admin.master')
@section('content')
<section class="container-fluid">
    <div class="row content">
        <div class="col-md-8 offset-md-2 pl-0 pr-0">

            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3"> profile</h4>
                </div>
            </div>

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
<img style="width:150px;height:110px;margin-bottom:10px"src="{{asset(Auth::user()->pic)}}" id="preview-image">
</div>
</td>
</tr>
                                   
                <tr>

                    <td>
                    <!-- Image Preview Before Upload using JavaScript -->
<form  action="{{ route('upload-userpic')}}" method="POST" enctype="multipart/form-data">
@csrf
<label for="upload">Upload Image: </label>
<input type="file" name="img"  onchange="previewImage(this);">
<input type="hidden" name="id" value="{{$id}}">
<input type="submit" value="Upload" class="btn btn-block btn-info">
</form>
                  </td>
                </tr> 
               






</div>
                   
        
                </table>
            </div>
        </div>
    </div>
</section>
<!--Content End-->

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


