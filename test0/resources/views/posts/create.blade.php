@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('post') }}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="col-8 offset-2">
            <div class="row">
                <h1>Add New Posts</h1>
            </div>
            <div class="form-group row mb-3">
                <label for="caption" class="col-md-4 col-form-label">Post Caption</label>
                <input 
                id="caption" 
                type="text" 
                class="form-control @error('caption') is-invalid @enderror" 
                name="caption" 
                value="{{ old('caption') }}" 
                required autocomplete="caption" autofocus>

                @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="row">
                <label for="image" class="col-md-4 col-form-label">Post Image</label>
                <input type = "file" class = "form-control-file @error('password') is-invalid @enderror" id = "image" name = "image">
                @error('image')
                    <strong>{{ $message }}</strong>
                @enderror
            </div>

            <div class="row pt-4">
                <button class="btn btn-primary" style = " width:150px;">Add New Posts</button>
            </div>
        </div>
    </form>  
</div>
@endsection
