@extends('layouts.app')
@section('breadcrumb')
<li class="breadcrumb-item">
    tournament
</li>
@endsection
@section('header')
<h3><i class="fa fa-list"></i> tournament players </h3>
@endsection


@section('content')

<div class="row">
	<div class="p-5" style="width:100%;">
	     <div class="p-3">
	    <a class="btn btn-primary" href="{{route('tournamentplayers.create')}}">
    <i class="fa fa-plus"></i> Tournament Players</a></div>
	<table class="table table-bordered table-striped">
            <tbody>
		<tr>
		<th>ID</th>	<th>Tournament</th>	<th>Piegens</th><th>Action</th></tr>
    @foreach($tournament_players as $tournament_player)
    <div class="col-sm-6">
        @include('cards.tournament_players')
    </div>
    @endforeach
    </tbody>
        </table>
    </div>
</div>
{!! $tournament_players->render() !!}
@endSection