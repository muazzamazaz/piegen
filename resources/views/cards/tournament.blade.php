            		<tr>
			<td>   <a href="{{route('tournament.show',$record->id)}}"> {{$record->id}}</a></td>
            <td>{{$record->name}}</td>
            @foreach($items as $item)
            @if($item->id==$record->season)
			<td>{{$item->name}}</td>
            @endif
            @endforeach
	
        
            <td>{{$record->piegen}}</td>
            <td>       <a class="btn btn-success" href="{{route('tournament.edit',$record->id)}}">
    <i class="fa fa-pencil"></i> Edit</a>
                    <form onsubmit="return confirm('Are you sure you want to delete?')"
      action="{{route('tournament.destroy',$record->id)}}"
      method="post"
      style="display: inline">
    {{csrf_field()}}
    {{method_field('DELETE')}}
    <button type="submit" class="btn btn-danger cursor-pointer">
        <i class=" fa fa-trash-alt"></i> Delete</button>
</form></td><td><a class="btn btn-success" href="{{route('tournament.result',$record->id)}}">
    <i class="fa fa-rocket"></i> Results</a></td>
        </tr>
            
