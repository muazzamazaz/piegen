<div class="p-5 col-6"><form action="{{isset($route)?$route:route('players.store')}}" method="POST" enctype="multipart/form-data">
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
        <label for="mobile">Mobile</label>
        <input type="text" class="form-control {{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" id="mobile" value="{{old('mobile',$model->mobile)}}" placeholder="" maxlength="191" required="required" >
          @if($errors->has('mobile'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('mobile') }}</strong>
    </div>
  @endif 
    </div>

<div class="form-group">
    <label for="address">Address</label>
    <textarea id="address" name="address" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" rows="3">{{old('address',$model->address)}}</textarea>
      @if($errors->has('address'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('address') }}</strong>
    </div>
  @endif
</div> 

    <div class="form-group">
        <label for="picture">Picture</label>
        <img width="70px" height=70px" src="{{url('/images/'.$model->picture)}}" alt="Image"/>
        <input type="file" class="form-control {{ $errors->has('picture') ? ' is-invalid' : '' }}" name="picture" id="picture" value="{{old('picture',$model->picture)}}" required="required" >
          @if($errors->has('picture'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('picture') }}</strong>
    </div>
  @endif 
    </div>


    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear"/>
        <input type="submit" class="btn btn-primary" value="Save"/>

    </div>
</form>
</div>