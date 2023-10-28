            		<tr>
			
			<td><a href="{{route('season.show',$record->id)}}"> {{$record->id}}</a></td>
            <td>{{$record->name}}</td>
            <td>        <a class="btn btn-success" href="{{route('season.edit',$record->id)}}">
    <i class="fa fa-pencil"></i> Edit</a>
                    <form onsubmit="return confirm('Are you sure you want to delete?')"
      action="{{route('season.destroy',$record->id)}}"
      method="post"
      style="display: inline">
    {{csrf_field()}}
    {{method_field('DELETE')}}
    <button type="submit" class="btn btn-danger cursor-pointer">
        <i class=" fa fa-trash-alt"></i> Delete</button>
</form></td>
		</tr>

