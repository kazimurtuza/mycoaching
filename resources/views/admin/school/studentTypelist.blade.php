
@extends('admin.master')
@section('content')
<!--Content Start-->
<section class="container-fluid">
    <div class="row content registraion-form">
        <div class="col-12 pl-0 pr-0">

     @if(Session::get('message'))
            {{session::get('message')}}
     @endif

            <div class="form-group cen">
                <div class="col-sm-12 text-center">
                    <h4 class="text-center font-weight-bold font-italic mt-3">student types</h4><span><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" class="btn btn-info">Add student types</button></span>
                </div>
            </div>  
        
   

        </div>
    </div>
</section>

<div class="table-responsive col-sm-8 m-auto">
    <table  class="table table-bordered table-hover  text-center" id="batchlist">

      <thead>

        @if(Session::get('message'))
        {{Session::get('message')}}
        @else
        {{Session::get('error_message')}}
        @endif
        <tr>
            <th> SL</th>
            <th>classname</th>
            <th>studenttype</th>
            <th>status</th>
             
    
        </tr>
    </thead>

    <tbody id="studenttypetable"> 
    
    @include('admin.school.showstudenttypetable')  
   
    
    </tbody>

    </table> 

</div>

{{-- modal    start --}}





<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add student types</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="{{route('student-type-add')}}" method="post" id="studenttypeinsert"> 
          @csrf
      <div class="modal-body">
        <div class="form-group col-12 mb-3">
            <label for="class name">Class Name</label>
            <select name="class_id" id="class_id" class="form-control col-sm-12"  autofocus required>
              <option value="">--select--</option>
            @foreach($class as $classname )  
            
            <option value="{{$classname->id}}">{{$classname->classname}}</option>

            @endforeach

          </select>
        </div>   
        <div class="form-group col-12 mb-3">
            <label for="class name">Student types</label>
            <input type="text" class="col-sm-12 form-control required" name="studenttype" id="studenttype">

        </div>   
        
        
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary" id="reset"data-dismiss="modal">reset</button>
        <button type="submit" class="btn btn-primary">save</button>
      </div>
    </div>
      </form>
  </div>
</div>
{{-- modal    end --}}

<script>

$("#studenttypeinsert").submit(function(e){

e.preventDefault();
var url=$(this).attr('action');
var data =$(this).serialize();
var method=$(this).attr('method');

$('#exampleModal #reset').click();
$('#exampleModal').modal('hide');
$.ajax({
   data:data,
    url:url,
   type:method,
  success:function (){
    $.get("{{route('show-student-type-list')}}",function(data){

      $('#studenttypetable').empty().html(data);

    })
  }


})

})

</script>
@endsection