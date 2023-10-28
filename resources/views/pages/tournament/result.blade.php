@extends('layouts.app')
@section('breadcrumb')
<li class="breadcrumb-item">
    tournament
</li>
@endsection
@section('header')
<h3><i class="fa fa-list"></i> tournament </h3>
@endsection


@section('content')

<div class="row">
	<div class="p-5" style="width:100%;">
	     <div class="p-3">
	    <a class="btn btn-primary" >
    Tournament Result</a></div>
	<table class="table table-bordered table-striped">
            <tbody>
		<tr>
		<th>ID</th>	<th>Name</th><th>Picture</th>
       

        @php $times=0; $i=1; @endphp
        @while ($i <= $tournamentPlayers[0]->piegen)
        <th>Piegen {{$i}}</th>
        @php $i++; @endphp
        @endwhile
        <th>Total</th>
        </tr>

        @php $times=0; $i=1; @endphp
    @foreach($tournamentPlayers as $tournamentPlayer)
    

    <div class="col-sm-6">
        <tr>
        <td>{{$tournamentPlayer->id}}</td>
      
        <td>{{$tournamentPlayer->name}}</td>
      <td> <img width="50px" height="50px" src="{{url('/images/'.$tournamentPlayer->picture)}}" alt="Image"/></td>
        
        @php 
        $i=1; 
$time = strtotime('00:00:00');
$total_time = 0;
        @endphp

        @foreach ($piegens as $pieg)     
        
        @if($tournamentPlayer->tid == $pieg->tournament_player_id)   
        <td>{{$pieg->piegen_time}}</td>
@php

$sec_time = strtotime($pieg->piegen_time) - $time;
$total_time = $total_time + $sec_time;



     
        $times = $pieg->piegen_time;
        $i++; @endphp
        @endif
        @endforeach
<td>
    @php
$hours = intval($total_time / 3600);
$total_time = $total_time - ($hours * 3600);
$min = intval($total_time / 60);
$sec = $total_time - ($min * 60);
echo ("$hours:$min:$sec");
    @endphp

</td>
    </div>
    </tr>
    @endforeach
   
    </tbody>
        </table>

    </div>
</div>

@endSection