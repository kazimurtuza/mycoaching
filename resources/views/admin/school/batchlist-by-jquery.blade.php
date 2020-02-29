
<thead>


    <tr>
        <th> SL</th>
        <th>batch</th>
        <th>capacity</th>
        <th>status</th>
        

    </tr>
</thead>
<tbody>
    @php
        $i=1;
    @endphp
    @foreach ($batch as $batch)
    <tr>
    <td>{{$i++}}</td>
    <td>{{$batch->batch_name}}</td>
    <td>{{$batch->capacity}}</td>
    <td>{{$batch->status==1 ? 'publish':'unpublish'}}</td>
  
    <td> 
        
        @if($batch->status=='1')
    <button onclick="unpublish({{$batch->class_id}},{{$batch->id}})"  class="btn btn-sm btn-info"><span class="fas fa-arrow-circle-up"></span></button>
       @else
    <button onclick="publish({{$batch->id}},{{$batch->class_id}})" class="btn btn-sm btn-warning"><span class="fas fa-arrow-circle-down"></span></button>
        @endif
    <a href="{{route('batch-edit',['batch_id'=>$batch->id])}}" target="_blank" class="btn btn-sm btn-success"><span class="fas fa-edit"></span></a>
    <button onclick="delt({{$batch->class_id}},{{$batch->id}})" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></button>
    </td>
    </tr>
    @endforeach
</tbody>
@if(Session::get('message'))
{{Session::get('message')}}
@else
{{Session::get('error_message')}}
@endif

<script>
    function unpublish(class_id,batch_id){
        $data=confirm('if you  want to unpublish : press ok');
        if($data)
        {
            $.get("{{route('batch-unpublish')}}",{class_id:class_id,batch_id:batch_id},function(data){
                $("#batchlist").html(data);
            })
        }
    }

    function publish(batch_id,class_id)
    {
        $data=confirm('if u want to publish press :  ok ');
        if($data)
        {
            $.get("{{route('batch-publish')}}",{batch_id:batch_id,class_id:class_id},function(data){
                $('#batchlist').html(data);
            })
        }
    }

    function delt(class_id,batch_id)
    {
        $data=confirm('if you want to delete this batch press : ok');
        if($data)
        {
            $.get("{{route('batch-delete')}}",{batch_id:batch_id,class_id:class_id},function(data)
            {
                $('#batchlist').html(data);
            })
        }
    }
</script>