@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3" style="padding:px;">
            <img src="{{ $user->profile->profileImage()  }}" style="height:150px;"class="rounded-circle w-100"/>
        </div>
        <div class="col-9">
            <div class = "d-flex justify-content-between align-items-baseline" style = "">
                <div class="d-flex" style="align-items: center; padding-bottom: 15px">
                    <h4>{{ $user->username }}</h4>

                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                </div>

                @can('update', $user->profile)
                <a href="/p/create">Add New Post</a>
                @endcan
            </div>
            @can('update', $user->profile)
                <a href = "/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endcan
            <div class="d-flex">
                <div style="padding-right: 15px;"><strong>{{ $postCount }}</strong> posts</div>
                <div style="padding-right: 15px;"><strong>{{ $followerCount }}</strong> followers</div>
                <div style="padding-right: 15px;"><strong>{{ $followingCount }}</strong> following</div>
            </div>
            <div style="padding-top:10px;"><strong>{{ $user->profile->title ?? '' }}</strong></div>
            <div>{{ $user->profile->description ?? '' }}</div>
            <div><a href="#">{{ $user->profile->url ?? '' }}</a></div>
        </div>
    </div>

    <div class="row d-flex" style="padding-top:15px; overflow-x: auto;">
        @foreach($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{ $post->id }}">
                <img class="w-100" src="/storage/{{ $post->image }}" style="height:200px; width:50px;">
            </a>
        </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
