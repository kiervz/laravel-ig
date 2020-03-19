@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-10 offset-1">
        <div class="row">
            <div class="card w-100">
                <div class="row no-gutters">
                    <div class="col-8" >
                        <img src="/storage/{{ $post->image }}" class="img-fluid">
                    </div>
                    <div class="col-4">
                        <div class="card-header bg-white">
                            <a class="navbar-brand d-flex align-items-baseline" href="{{ route('profile.index', $post->user->username) }}" style="color:black">
                                <div><img src="/storage/{{ $post->user->profile->image }}" style="height: 30px;" class="rounded-circle"></div>
                                <div class="pl-3">{{ $post->user->username }}</div>
                            </a>
                        </div>

                        <div class="card-body" style="height:420px; overflow-y: auto;">
                            {{-- post caption --}}
                            <div class="media mb-1" style="border-bottom:1px solid #DFDFDF">
                                <img class="d-flex mr-3 rounded-circle" src="/storage/{{ $post->user->profile->image }}" style="height: 30px;" alt="">
                                <div class="media-body">
                                    <p><b><span class="text-lowercase">{{ $post->user->username }}</span></b>
                                        {{ $post->caption }}
                                        <br>
                                        <small class="text-muted">{{ date('M d, Y', strtotime($post->created_at)) }}</small>
                                    </p>
                                </div>
                            </div>
                            <br>
                            {{-- comments --}}
                            @foreach ($users_comments as $comment)
                                <div class="media mb-1">
                                    <a href="{{ route('profile.index', $comment->username) }}" style="text-decoration: none; color:black">
                                        <img class="d-flex mr-3 rounded-circle" src="/storage/{{ $comment->image }}" style="height: 30px;" alt="">
                                    </a>
                                    <div class="media-body">
                                        <p><b><a href="{{ route('profile.index', $comment->username) }}" style="text-decoration: none; color:black"><span class="text-lowercase">{{ $comment->username }}</span></a></b>
                                            {{ $comment->comment }}
                                            <br>
                                            <small class="text-muted">{{ date('M d, Y', strtotime($comment->created_at)) }}</small>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="card-footer d-flex bg-white">
                            <h3><a href=""><i class="far fa-heart mr-2  "></i></a></h3>
                            <h3><a href=""><i class="far fa-comment mr-2"></i></i></a></h3>
                            <h3><a href=""><i class="far fa-paper-plane"></i></a></h3>
                            <p class="small m-0 ml-3"><b>26,584 likes</b> <br> MARCH 8</p>
                        </div>
                        <div class="card-footer bg-white">
                            <form action="{{ route('comment.store', $post->id) }}" method="POST">
                                <div class="input-group">
                                    @csrf
                                    <input type="text" name="comment" class="form-control" placeholder="Comment">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-outline-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('page_js')
    <script src="{{ asset('/js/post/post.js') }}"></script>
@endsection