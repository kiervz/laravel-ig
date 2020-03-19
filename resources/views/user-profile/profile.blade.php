@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-10 offset-1">
        <div class="row">
            <div class="col-3 p-5">
                @if (empty($user->profile->image))
                    <img src="/img/no-profile.png" class="rounded-circle w-100">
                @else
                    <img src="/storage/{{ $user->profile->image }}" class="w-100 rounded-circle">
                @endif
            </div>
            <div class="col-9 p-5">
                <div class="d-flex justify-content-between align-items-baseline">    
                    <div class="d-flex align-items-center pb-2">
                        <div><h1>{{$user->username}}</h1></div>
                        @can('update', $user->profile)
                            <a href="{{ route('profile.edit', auth()->user()->id) }}" class="btn btn-outline-secondary btn-sm ml-3">Edit Profile</a>
                        @endcan
                    </div>
                    
                    @can('update', $user->profile)
                        <div><a href="{{ route('post.create') }}" class="btn btn-primary btn-sm">Add Post</a></div>
                    @endcan
                </div>
                <div class="d-flex">
                    <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> posts</div>
                    <div class="pr-5"><strong>2.7M</strong> followers</div>
                    <div class="pr-5"><strong>102</strong> following</div>
                </div>
    
                <div class="pt-4 font-weight-bold">{{$user->name}}</div>
                <div>{{$user->profile->description}}</div>
                <div><a href="">{{$user->profile->url}}</a></div>
            </div>
        </div>
        
        <div class="row">
            @foreach ($user->posts as $post)
                <div class="col-4">
                    <a href="{{ route('post.show', $post->id) }}">
                        <img src="/storage/{{ $post->image }}" class="img-fluid pb-3">
                    </a>
                </div>
            @endforeach
        </div>  
    </div>
    
</div>
@endsection