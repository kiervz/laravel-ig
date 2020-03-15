@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="/img/cong.jpg" class="w-100 rounded-circle">
        </div>
        <div class="col-9 p-5">
            <div class="d-flex align-items-center pb-4">
                <h1>{{$user->username}}</h1>
            </div>
            <div class="d-flex">
                <div class="pr-5"><strong>201</strong> posts</div>
                <div class="pr-5"><strong>2.7M</strong> followers</div>
                <div class="pr-5"><strong>102</strong> following</div>
            </div>

            <div class="pt-4 font-weight-bold">{{$user->name}}</div>
            <div>This is description gago!</div>
            <div><a href="">thecongtv.com</a></div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-4">
            <img src="/img/post1.jpg" class="w-100">
        </div>
        <div class="col-4">
            <img src="/img/post2.jpg" class="w-100">
        </div>
        <div class="col-4">
            <img src="/img/post3.jpg" class="w-100">
        </div>
    </div>  
    
</div>
@endsection
