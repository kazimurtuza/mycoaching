
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
                    <h4 class="text-center font-weight-bold font-italic mt-3">class wise batch show</h4>
                </div>
            </div>  
        
            <div class="form-group col-12 mb-3">
                <label for="class name">Class Name</label>
            <select name="class_id" id="class_id" class="form-control col-sm-12"  autofocus required>
                <option value="">--select--</option>
              @foreach($classname as $class )  
              
              <option value="{{$class->id}}">{{$class->classname}}</option>

              @endforeach

            </select>
            </div>   

        </div>
    </div>
</section>

<div class="table-responsive col-sm-8 m-auto">
    <table  class="table table-bordered table-hover  text-center" id="batchlist">



    </table>

</div>


<script>

    $("#class_id").change(function(){
        var id=$(this).val();
        if(id)
        {
            $.get("{{route('batch-list-by-jquery')}}",{id:id},function(data){ 
            
                $("#batchlist").html(data);

              })
        }
    })
</script>
@endsection