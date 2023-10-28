<div class="p-5 col-11">
    <form action="{{isset($route)?$route:route('tournament.store')}}" method="POST" >
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>
        <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" value="{{old('name',$model->name)}}" placeholder="" maxlength="191" required="required" >
          @if($errors->has('name'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('name') }}</strong>
    </div>
  @endif 
    </div>


    <div class="form-group">
        <label for="season">Season</label>
        <select name="season" id="season" class="form-control">
        @foreach($items as $item)
        <option value="{{$item->id}}" {{ $item->id==$model->season ? 'selected' : '' }} >{{ $item->name }}</option>
        @endforeach

  </select>
    </div>


      <div class="form-group">
        <label for="name">Piegen</label>
        <input type="number" class="form-control {{ $errors->has('piegen') ? ' is-invalid' : '' }}" name="piegen" id="piegen" value="{{old('piegen',$model->piegen)}}" placeholder="" maxlength="191" required="required" >
          @if($errors->has('piegen'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('piegen') }}</strong>
    </div>
  @endif 
    </div>


@include('forms.tournament_detail')

    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear"/>
        <input type="submit" class="btn btn-primary" value="Save"/>

    </div>
</form>
</div>