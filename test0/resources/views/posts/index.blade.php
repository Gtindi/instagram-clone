@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($posts as $post)
            <div class="row d-flex justify-content-center">
                <div class="col-5 offset-2" style="padding-bottom: 50px;">
                    <a href="/profile/{{ $post->user->id }}">
                        <img src="/storage/{{ $post->image }}" class="w-100">

                    </a>
                    <p>{{ $post->caption }}</p>
                </div>
            </div>
        @endforeach
        <div class="row d-flex justify-content-center">
            <div class="col">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
