@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-10 offset-1">
        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <h1>Add New Post</h1>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Upload Image</label>
                            <input type="file" id="imgInp" name="image">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <img src="/img/350x350.png" id='img-upload' class="img-fluid"/>
                    </div>
                    @error('image')
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>

                <div class="col-md-8">
                    <label for="Caption">Caption</label>
                    <textarea  type="text" id="caption" class="form-control @error('caption') is-invalid @enderror" 
                    name="caption" value="{{ old('caption') }}" autocomplete="caption" autofocus></textarea>
                
                    @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                        
                    <div class="pt-4">
                        <input type="submit"  value="Submit" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('page_js')
    <script src="{{ asset('/js/post/post.js') }}"></script>
@endsection