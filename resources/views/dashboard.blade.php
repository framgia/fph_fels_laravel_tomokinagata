@extends('layouts.dashboard')

@section('content_right')
    <h4 class="my-4">Activities</h4>
    <hr>
    @foreach (array_map(null, $subjects, $actions, $objects, $times) as [$subject, $action, $object, $time])
        <div class="row mb-2">
            <div class="h-100 ml-3 col-xs-4">
            @if ($subject->avatar != NULL)
                <img src="/storage/profile_images/{{ $subject->id }}.jpg" class="thumbnail_activity">
            @else
                <img src="{{ asset('img/default.png') }}" class="thumbnail_activity">
            @endif
            </div>
            <div class="h-100 ml-3 my-auto col-xs-8">
                <p class="my-0">
                    <a href="{{ action('ProfileController@profile', $subject) }}">{{ $subject->name === $user->name ? 'You' : $subject->name }}</a>
                    &nbsp;{{ $action }}&nbsp;
                    @if ($action == 'followed')
                        <a href="{{ action ('ProfileController@profile', $object) }}">{{ $object->name }}</a>
                    @else
                        <a href="{{ action ('LessonController@lessonIndex') }}">{{ $object->title }}</a>
                    @endif
                </p>
                <p class="text-secondary my-0">{{ $time }} (UTC)</p>
            </div>
        </div>
    @endforeach
@endsection