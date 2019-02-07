@extends('layouts.profile')

@section('content_right')
    <h4 class="my-4">Activities</h4>
    <hr>
    <div class="row mb-2">
        <div class="h-100 ml-2 col-xs-4">
            <img src="{{asset('img/cat.jpg')}}" class="thumbnail_activity">
        </div>
        <div class="h-100 ml-2 my-auto col-xs-8">
            <p><a href="#">You</a> learned 20 of 20 words in <a href="#">Basic 500</a></p>
            <p class="text-secondary">2 days ago</p>
        </div>
    </div>
@endsection