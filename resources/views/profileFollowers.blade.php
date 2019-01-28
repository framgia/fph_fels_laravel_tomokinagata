@extends('layouts.profile')

@section('content_left')
    <h4 class="my-4">Followers</h4>
    <hr>
        <div class="row mb-2">
            @foreach ($followers as $follower)
                <div class="h-100 ml-3 col-xs-4">
                    @if ($follower->avatar != NULL)
                        <img src="/storage/profile_images/{{ $follower->id }}.jpg"  style="max-height: 80px; max-width: 80px;" class="">
                    @else
                        <img src="{{ asset('img/default.png') }}"  style="max-height: 80px; max-width: 80px;">
                    @endif
                    <a href="{{ action('ProfileController@profile', $follower) }}">
                        <h5 class="text-center my-2">{{ $follower->name }}</h5>
                    </a>
                </div>
            @endforeach
        </div>
@endsection