@extends('layouts.app')

@section('breadcrumb')
<li class="breadcrumb-item">
    players
</li>
@endsection
@section('header')
<h3><i class="fa fa-list"></i> Players </h3>

@endsection

@section('content')

<div class="row">

	<div class="p-5" style="width:100%;">
	  <div class="p-3">
	        
	           <a class="btn btn-primary" href="{{route('players.create')}}">
    <i class="fa fa-plus"></i> New Player</a>
	        
	    </div>
	 
        <table class="table table-bordered table-striped">
            <tbody>
            		<tr>
		<th>ID</th>	<th>Name</th>	<th>Mobile</th><th>Picture</th><th>Action</th></tr>
    @foreach($records as $record)
    <div class="col-sm-6">

        @include('cards.player')
    </div>
    @endforeach
      </tbody>
        </table>
</div>
{!! $records->render() !!}
@endSection