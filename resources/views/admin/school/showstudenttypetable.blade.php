
  @if(count($stutypelist )>0)
      @php($i=1)
    @foreach ($stutypelist  as $stutypelist )
    <tr> 
    <td>{{$i++}}</td>
    <td>{{$stutypelist->classname}} </td> 
    <td>{{$stutypelist->student_type}}</td>
    <td>{{$stutypelist->status==1 ? 'publish':'unpublish'}}</td>
  
    <td> 
        
        @if($stutypelist->status=='1')
    <button onclick="unpublish({{$stutypelist->class_id}},{{$stutypelist->id}})"  class="btn btn-sm btn-info"><span class="fas fa-arrow-circle-up"></span></button>
       @else
    <button onclick="publish({{$stutypelist->id}},{{$stutypelist->class_id}})" class="btn btn-sm btn-warning"><span class="fas fa-arrow-circle-down"></span></button>
        @endif
    <a href="{{route('batch-edit',['batch_id'=>$stutypelist->id])}}" target="_blank" class="btn btn-sm btn-success"><span class="fas fa-edit"></span></a>
    <button onclick="delt({{$stutypelist->class_id}},{{$stutypelist->id}})" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></button>
    </td>
    </tr>
    @endforeach 
    @else
    <tr class="bg-danger">
        <td colspan="4"> <h3>there have no student type data </h3></td>
       
    </tr>

    @endif






