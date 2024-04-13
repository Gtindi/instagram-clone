@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" class = "w-100">
        </div>
        <div class="col-4">
            <div class="d-flex align-items-center">
                <div class="">
                    <img src="{{ $post->user->profile->profileImage()  }}" alt="" class="w-100 rounded-circle pb-4" style="height:80px;">
                </div>
                <div class="d-flex">
                    <a href="/profile/{{ $post->user->id  }}">
                        <span style="color:#18181b;">
                            <h1>{{ $post->user->username }}</h1>
                        </span>
                    </a>
                    <a href="#" style="padding-left: 50px;">Follow</a>
                </div>
            </div>
            <p>{{ $post->caption }}</p>
        </div>
    </div>
</div>
@endsection
