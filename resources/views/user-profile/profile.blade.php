@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-10 offset-1">
        <div class="row">
            <div class="col-3 p-5">
                <img src="{{ $user->profile->profileImage() }}" class="w-100 rounded-circle">
            </div>
            <div class="col-9 p-5">
                <div class="d-flex justify-content-between align-items-baseline">    
                    <div class="d-flex align-items-center pb-2">
                        <div><h1>{{$user->username}}</h1></div>
                        @can('update', $user->profile)
                            <a href="{{ route('profile.edit', auth()->user()->id) }}" class="btn btn-outline-secondary btn-sm ml-3">Edit Profile</a>
                        @else
                            <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                        @endcan
                    </div>
                    
                    @can('update', $user->profile)
                        <div><a href="{{ route('post.create') }}" class="btn btn-primary btn-sm">Add Post</a></div>
                    @endcan
                </div>
                <div class="d-flex">
                    <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> posts</div>
                    <div class="pr-5"><strong>{{ $user->profile->followers->count()}}</strong> followers</div>
                    <div class="pr-5"><strong>{{ $user->following->count() }}</strong> following</div>
                </div>
    
                <div class="pt-4 font-weight-bold">{{$user->name}}</div>
                <div>{{$user->profile->description}}</div>
                <div><a href="">{{$user->profile->url}}</a></div>
            </div>
        </div>
        
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-4">
                    <a href="{{ route('post.show', $post->id) }}">
                        <img src="/storage/{{ $post->image }}" class="img-fluid pb-3">
                    </a>
                </div>
            @endforeach
            {{ $posts->links() }}
        </div>  
    </div>
    
</div>
@endsection
