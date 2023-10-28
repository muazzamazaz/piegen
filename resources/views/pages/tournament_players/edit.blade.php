@extends('layouts.app')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{route('tournamentplayers.index')}}">tournament players</a>
</li>
<li class="breadcrumb-item">
    <a href="{{route('tournamentplayers.show',$tournament_player->players)}}">{{$tournament_player->id}}</a>
</li>
<li class="breadcrumb-item">
    Edit
</li>
@endsection
@section('header')
<h3><i class="fa fa-pencil"></i> Edit {{$tournament_player->id}}</h3>
@endSection

@section('tools')
<a class="btn btn-secondary" href="{{route('tournamentplayers.create')}}">
    <span class="fa fa-plus"></span>
</a>
@endsection

@section('content')
<div class="row">
    <div class='col-md-12'>
        <div class='card'>
            <div class="card-body">
                @include('forms.tournament_players',[
                'route'=>route('tournamentplayers.update',$tournament_player->id),
                'method'=>'PUT'
                ])
            </div>
        </div>
    </div>
</div>
@endSection