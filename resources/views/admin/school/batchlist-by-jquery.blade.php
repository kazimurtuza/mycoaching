
<thead>
    <tr>
        <th> SL</th>
        <th>batch</th>

    </tr>
</thead>
<tbody>
    @php
        $i=1;
    @endphp
    @foreach ($batch as $batch)
    <tr>
    <th>{{$i++}}</th>
    <th>{{$batch->batch_name}}</th>
    </tr>
    @endforeach
</tbody>