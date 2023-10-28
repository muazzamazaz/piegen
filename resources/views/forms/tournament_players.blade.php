<div class="p-5 col-11">
    <form action="{{isset($route)?$route:route('tournamentplayers.store')}}" method="POST" >
    {{csrf_field()}}


       <div class="form-group">
        <label for="tournaments">Tournament</label>
        <select name="tournaments" id="tournaments" class="form-control">
        @foreach($tournaments as $tournament)     
        <option value="{{$tournament->id}}">{{ $tournament->name }}</option>
        @endforeach

  </select>
    </div>


   <div class="form-group">
        <label for="players">Player</label>
        <select name="players" id="players" class="form-control">
        @foreach($players as $player)
     
        <option value="{{$player->id}}">{{ $player->name }}</option>
        @endforeach

  </select>
    </div>
    
    

@include('forms.tournament_piegens')

    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear"/>
        <input type="submit" class="btn btn-primary" value="Save"/>

    </div>
</form>
</div>