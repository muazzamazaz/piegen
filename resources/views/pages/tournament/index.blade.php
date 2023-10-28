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
	    <a class="btn btn-primary" href="{{route('tournament.create')}}">
    <i class="fa fa-plus"></i> New Tournament</a></div>
	<table class="table table-bordered table-striped">
            <tbody>
		<tr>
		<th>ID</th>	<th>Name</th>	<th>Season</th><th>Piegen</th><th>Action</th><th>Report</th></tr>
    @foreach($records as $record)
    <div class="col-sm-6">
        @include('cards.tournament')
    </div>
    @endforeach
    </tbody>
        </table>
    </div>
</div>
{!! $records->render() !!}
@endSection