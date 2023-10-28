@extends('layouts.app')
@section('breadcrumb')
<li class="breadcrumb-item">
    season
</li>
@endsection
@section('header')
<h3><i class="fa fa-list"></i> season </h3>
@endsection



@section('content')

<div class="row">
    <div class="p-5" style="width:100%;">
         <div class="p-3">
        <a class="btn btn-primary" href="{{route('season.create')}}">
    <i class="fa fa-plus"></i> New Season</a></div>
	<table class="table table-bordered table-striped">
            <tbody>
        <tr>
		<th>ID</th>	<th>Name</th><th>Action</th></tr>
    @foreach($records as $record)
    <div class="col-sm-6">
        @include('cards.season')
    </div>
    @endforeach
       </tbody>
        </table>
    </div>
</div>
{!! $records->render() !!}
@endSection