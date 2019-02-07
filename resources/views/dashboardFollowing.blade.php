@extends('layouts.dashboard')

@section('content_right')
    <h4 class="my-4">Following</h4>
    <hr>
        <div class="row mb-2">
            @foreach ($followings as $following)
                <div class="h-100 col-3 text-center">
                    @if ($following->avatar != NULL)
                        <img src="/storage/profile_images/{{ $following->id }}.jpg" class="thumbnail_friend">
                    @else
                        <img src="{{ asset('img/default.png') }}" class="thumbnail_friend">
                    @endif
                    <a href="{{ action('ProfileController@profile', $following) }}">
                        <h5 class="text-center my-2">{{ $following->name }}</h5>
                    </a>
                </div>
            @endforeach
        </div>
@endsection