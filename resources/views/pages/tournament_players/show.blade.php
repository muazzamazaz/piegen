@extends('layouts.app')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{route('tournament_players.index')}}">tournament</a>
</li>
<li class="breadcrumb-item">
    {{$record->id}}
</li>

@endsection
@section('header')
<h3><i class="fa fa-eye"></i> {{$record->id}}</h3>
@endsection
@section('tools')
<div class="btn-group">
    
<a class="btn btn-secondary" href="{{route('tournament_players.create')}}">
    <span class="fa fa-plus"></span>
</a>
<a class="btn btn-secondary" href="{{route('tournament_players.edit',$record->id)}}">
    <span class="fa fa-pencil"></span>
</a>
<form onsubmit="return confirm('Are you sure you want to delete?')"
      action="{{route('tournament_players.destroy',$record->id)}}"
      method="post"
      style="display: inline">
    {{csrf_field()}}
    {{method_field('DELETE')}}
    <button type="submit" class="btn btn-secondary cursor-pointer">
        <i class="text-danger fa fa-remove"></i>
    </button>
</form>

</div>
@endsection

@section('content')

<div class="row">
    <div class="col-sm-4">
        @include('cards.tournament_players')
    </div>
</div>
@endSection