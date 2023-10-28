			<td><a href="{{route('players.show',$record->id)}}"> {{$record->id}}</a></td>
            <td>{{$record->name}}</td>
			<td>{{$record->mobile}}</td>
			<td> <img width="50px" height="50px" src="{{url('/images/'.$record->picture)}}" alt="Image"/></td>
            <td><a class="btn btn-success" href="{{route('players.edit',$record->id)}}">
    <i class="fa fa-pencil"></i> Edit</a>
                    <form onsubmit="return confirm('Are you sure you want to delete?')"
      action="{{route('players.destroy',$record->id)}}"
      method="post"
      style="display: inline">
    {{csrf_field()}}
    {{method_field('DELETE')}}
    <button type="submit" class="btn btn-danger cursor-pointer">
        <i class=" fa fa-trash-alt"></i> Delete</button>
</form></td>
		</tr>



