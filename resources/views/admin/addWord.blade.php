@extends('layouts.app')

@section('title', 'Categories')

@section('subtitle', ' | Category')

@section('content')
<div class="container">
    <form method="post" action="{{ action('WordController@create') }}">
        {{csrf_field()}}
        <h3>Add word</h3>
        <input type='hidden' name='category_id' value="{{ $category_id }}">
        <div id="forms" class="m-0 p-0"></div>
    </form>
</div>
@endsection


