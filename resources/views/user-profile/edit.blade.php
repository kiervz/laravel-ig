@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('profile.update', auth()->user()->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="col-8 offset-2">
            <div class="row">
                <h1>Edit Profile</h1>
            </div>
            <div class="form-group row">
                <label for="description">description</label>
                <textarea cols="30" rows="5" id="description" 
                class="form-control @error('description') is-invalid @enderror"
                name="description" autocomplete="description" autofocus
                >{{ old('description') ?? $user->profile->description }}</textarea>

                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group row">
                <label for="url">Url/Website</label>
                <input type="text" id="url" 
                class="form-control @error('url') is-invalid @enderror"
                name="url"
                value="{{ old('url') ?? $user->profile->url }}"
                autocomplete="url" autofocus>

                @error('url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group row">
                <label for="url">Profile Image</label>
                <input type="file" id="image" name="image" class="form-control-file">

                @error('url')
                    <strong>{{ $message }}</strong>
                @enderror
            </div>  
            <div class="form-group row">
                <div class="pt-4">
                    <input type="submit"  value="Submit" class="btn btn-primary">
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
