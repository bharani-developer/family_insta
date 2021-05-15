@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                    <div class="h4">{{ $user->username }}</div>

                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                </div>

                @can('update', $user->profile)
                    <a class="profile__button u-fat-text" href="/p/create">Add New Post</a>
                @endcan

            </div>

            @can('update', $user->profile)
                <a class="profile__button u-fat-text" href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endcan
        <br><br>
            <div class="profile__info">
               
                <ul class="profile__numbers">
                    <li class="profile__posts">
                        <span class="profile__number u-fat-text">{{ $postCount }}</span> posts
                    </li>
                    <li class="profile__followers">
                        <span class="profile__number u-fat-text">{{ $followersCount }}</span> followers
                    </li>
                    <li class="profile__following">
                        <span class="profile__number u-fat-text">{{ $followingCount }}</span> following
                    </li>
                </ul>
                <div class="profile__bio">
                    <span class="profile__full-name u-fat-text">{{ $user->profile->title }}</span><br><br>
                    <p class="profile__full-bio">{{ $user->profile->description }}</p><br><br>
                    <a href="http://serranoarevalo.com" class="profile__link u-fat-text">{{ $user->profile->url }}</a><br><br>
                </div>
            </div>
           
            
        </div>
    </div>

    <div class="row pt-5">
        @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100">
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
