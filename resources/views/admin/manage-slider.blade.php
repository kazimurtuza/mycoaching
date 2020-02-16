@extends('admin.master')
@section('content')
<section class="container-fluid">
    <div class="row content">
        <div class="col-12 pl-0 pr-0">

            {{-- message start --}}

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
{{-- message end --}}




            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">slide List</h4>
                </div>
            </div>

            <div class="table-responsive p-1">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                    <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>slideTitle</th>
                        <th>slidedescription</th>
                        <th>status</th>
                        <th>Image</th>
                        <th>status</th>
                        
                        <th style="width: 100px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($slide as $list )
                        
                    <tr>
                        <td>{{$i++}}</td>
                    <td>{{$list->slideTitle}}</td>
                    <td>{{$list->slidedescription}}</td>
                    <td>{{$list->status}}</td>
                    
                    <td><img src="{{$list->img}}" alt="" style="width:200px ;height:100px"></td> 

                 <td @if($list->status==1) style="color:green" @else style="color:red" @endif>
                         {{$list->status==1 ? 'publish' : 'unpublish'}}
                    </td>

                        <td> 
                            @if($list->status==1)
                            
                        <a href="{{route('unpublish-list',['id'=>$list->id])}}" class="btn btn-sm btn-info"><span class="fas fa-arrow-circle-up"></span></a>
                            @else
                            <a href="{{route('publish-list',['id'=>$list->id])}}" class="btn btn-sm btn-warning"><span class="fas fa-arrow-circle-down"></span></a>
                            @endif
                            
                        <a href="{{route('edit-slide',['id'=>$list->id])}}" class="btn btn-sm btn-success"><span class="fas fa-edit"></span></a>
                            <a href="{{route('delete-slide',['id'=>$list->id])}}" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!--Content End-->
@endsection