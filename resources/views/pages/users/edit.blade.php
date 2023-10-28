@extends('layouts.app')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{route('users.index')}}">users</a>
</li>
<li class="breadcrumb-item">
    <a href="{{route('users.show',$user->id)}}">{{$user->id}}</a>
</li>
<li class="breadcrumb-item">
    Edit
</li>
@endsection
@section('header')
<h3><i class="fa fa-pencil"></i> Edit {{$user->id}}</h3>
@endSection

@section('tools')
<a class="btn btn-secondary" href="{{route('users.create')}}">
    <span class="fa fa-plus"></span>
</a>
@endsection

@section('content')
<div class="row">
    <div class='col-md-12'>
        <div class='card'>
            <div class="card-body">
                @include('forms.user',[
                'route'=>route('users.update',$user->id),
                'method'=>'PUT'
                ])
            </div>
        </div>
    </div>
</div>
@endSection