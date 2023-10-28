@extends('layouts.app')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{route('tournament.index')}}">tournament</a>
</li>
<li class="breadcrumb-item">
    Create
</li>
@endsection
@section('header')
<h3><i class="fa fa-plus"></i> Create New tournament</h3>
@endSection
@section('content')
<div class="row">
    <div class='col-md-12'>
        @include('forms.tournament')
    </div>
</div>
@endSection