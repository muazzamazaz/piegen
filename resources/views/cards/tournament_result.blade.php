        <tr>
			<td>{{$tournamentPlayer->id}}</td>
            <td>{{$tournamentPlayer->name}}</td>
         
            <td>{{$tournamentPlayer->piegen}}</td>
        </tr>
<!--
        @if(isset($tournament_palyers))
        @foreach($tournament_palyers as $tp)
            @if($tp->tournaments==$record->id)
                <tr><td>{{$tp->id}}</td><td>{{$tp->name}}</td></tr>
            @endif            
        @foreach        
        @endif   
