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
                    
                      
                        <tr> <td colspan="3" style="background:rgb(235,247,227)"><img src="{{asset('public')}}/assets/images/img-3.jpg" alt="not found img" style="width:150px;height:110px;margin-bottom:10px">
                    </td>
                </tr>
                <tr>
                       <td>
                      
                          <input type="file" name="pic">
                           
                        </td>
                
                        
                </tr>
                <tr>

                    <td>
                      <form action="{{route('change-userphoto')}}" method="post" enctype="multipart/form-data">
                     @csrf
                      <input type="hidden" name="id" value="{{$id}}">
                      
                      <input type="submit" class="btn btn-sm btn-block btn-info" value="change photo" >
                 
                      </form>
                     
                  </td>
                </tr> 
                   
                   
        
                </table>
            </div>
        </div>
    </div>
</section>
<!--Content End-->
@endsection


