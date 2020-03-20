@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-6">
            @foreach ($posts as $post)
                <div class="card mb-5">
                    <div class="d-flex align-items-center p-2">
                        <img src="{{ $post->user->profile->profileImage() }}" style="max-width:40px" class="rounded-circle mr-3">
                        <h5 class="mt-2">{{ $post->user->username }}</h5>
                    </div>
                    <img src="storage/{{ $post->image }}" class="card-img-top w-100"> 
                    <div class="card-body">
                        <div class="d-flex">
                            <h4><a href=""><i class="far fa-heart mr-2"></i></a></h4>
                            <h4><a href=""><i class="far fa-comment mr-2"></i></i></a></h4>
                            <h4><a href=""><i class="far fa-paper-plane"></i></a></h4>
                            <p class="small m-0 ml-3 mt-1"><b>26,584 likes</b>
                        </div>
                        <h5 class="card-title">{{ $post->caption }}</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">{{ date('M d, Y', strtotime($post->created_at)) }}</small></p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-4">
            <div class="position-fixed col-4">
                <div class="d-flex align-items-center p-2">
                    <img src="{{ auth()->user()->profile->profileImage() }}" style="max-width:50px" class="rounded-circle mr-3">
                    <h5 class="text-md-left mt-2"><b>{{ auth()->user()->username }}</b><br><span class="small"> {{ auth()->user()->name }}</span></h5>      
                </div>
                <div class="card mb-5">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>
   </div>
</div>
@endsection