    

                	<tr>
			<td>   <a href="{{route('tournamentplayers.show',$tournament_player->id)}}"> {{$tournament_player->id}}</a></td>
            <td>{{$tournament_player->name}}</td>
                    
            <td>{{$tournament_player->piegen}}</td>
            <td>       <a class="btn btn-success" href="{{route('tournamentplayers.edit',$tournament_player->id)}}">
    <i class="fa fa-pencil"></i> Edit</a>
                      <form onsubmit="return confirm('Are you sure you want to delete?')"
      action="{{route('tournamentplayers.destroy',$tournament_player->id)}}"
      method="post"
      style="display: inline">
    {{csrf_field()}}
    {{method_field('DELETE')}}
    <button type="submit" class="btn btn-danger cursor-pointer">
        <i class=" fa fa-trash-alt"></i> Delete</button>
</form></td>
        </tr>
            
