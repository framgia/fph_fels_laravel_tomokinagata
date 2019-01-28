@extends('layouts.profile')

@section('content_left')
    <h4 class="my-4">Following</h4>
    <hr>
        <div class="row mb-2">
            @foreach ($followings as $following)
                <div class="h-100 ml-3 col-xs-4">
                    @if ($following->avatar != NULL)
                        <img src="/storage/profile_images/{{ $following->id }}.jpg"  style="max-height: 80px; max-width: 80px;" class="">
                    @else
                        <img src="{{ asset('img/default.png') }}"  style="max-height: 80px; max-width: 80px;">
                    @endif
                    <a href="{{ action('ProfileController@profile', $following) }}">
                        <h5 class="text-center my-2">{{ $following->name }}</h5>
                    </a>
                </div>
            @endforeach
        </div>
@endsection