<?php
    //Processing user answers data to display.
    $result = session()->get('result');
    $success = (in_array('1', $result)) ? array_count_values($result)[1] : 0;
    extract($result, EXTR_PREFIX_INVALID, 'answer');
?>
@extends ('layouts.app')

@section('title')
    {{ 'Lesson | '. $category->title. ' | Result' }}
@endsection

@section('content')
<div class="container">
    <h3 class="mb-3">
        {{ $category->title }}
        <span class="float-right">Result: {{ $success }} of {{ count($words) }}</span>
    </h3>
    <div class="row">
        <div class="col-4 text-center my-3"></div>
        <div class="col-4 text-center my-3"><h5>Word</h5></div>
        <div class="col-4 text-center my-3"><h5>Answer</h5></div>
        @for($counter = 1; $counter <= count($words); $counter++)
            <div class="col-4 text-center mb-2">{!! ${'answer_'.$counter} == 1 ? '&#9675;' : '&#x2613;' !!}</div>
            <div class="col-4 text-center mb-2">{{ $words->get($counter-1)->content }}</div>
            <div class="col-4 text-center mb-2">
                {{ $word_answers->where('word_id', $words->get($counter-1)->id)->first()->content }}
            </div>
        @endfor
        <div class="col-4 my-4"></div>
        <div class="col-4 my-4"></div>
        <div class="col-4 my-4 text-center">
            <a href="{{ action('LessonController@lessonIndex') }}"><button class="btn btn-primary">Back to Categories</button></a>
        </div>
    </div>
</div>
@endsection
