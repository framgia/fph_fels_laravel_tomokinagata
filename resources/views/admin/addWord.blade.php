@extends ('layouts.app')

@section('title', 'Categories')

@section('admin_mark', ' | Admin')

@section('content')
<div class="container">
    <form method="post" action="{{ action('WordController@create') }}">
        {{csrf_field()}}
        <h3 class="mb-5">Add word</h3>
        <div class="row">
            <div class="col-sm-6  col-xs-12 mb-4">
                <h5 class="mb-4">Word</h5>
                <input type="hidden" name="category_id" value="{{ $category_id }}">
                <input id="word" type="text" class="form-control{{ $errors->has('word') ? ' is-invalid' : '' }} mb-4 col-11" name="word" value="{{ old('word') }}" required>
            </div>

            <div class="col-sm-6 col-xs-12">
                <div class="row">
                    <h5 class="mb-0 col-10">Choices</h5>
                    <h5 class="mb-0 col-2">Answer</h5>
                </div>
                <div class="row">
                    <input type="text" class="form-control{{ $errors->has('choice1') ? ' is-invalid' : '' }} mb-4 col-10" name="choice1" value="{{ old('choice1') }}" required>
                    <input type="radio" class="col-1 mt-2 ml-3" name="check" value="choice1" required>
                    <input type="text" class="form-control{{ $errors->has('choice2') ? ' is-invalid' : '' }} mb-4 col-10" name="choice2" value="{{ old('choice2') }}" required>
                    <input type="radio" class="col-1 mt-2 ml-3" name="check" value="choice2">
                    <input type="text" class="form-control{{ $errors->has('choice3') ? ' is-invalid' : '' }} mb-4 col-10" name="choice3" value="{{ old('choice3') }}" required>
                    <input type="radio" class="col-1 mt-2 ml-3" name="check" value="choice3">
                    <input type="text" class="form-control{{ $errors->has('choice4') ? ' is-invalid' : '' }} mb-4 col-10" name="choice4" value="{{ old('choice4') }}" required>
                    <input type="radio" class="col-1 mt-2 ml-3" name="check" value="choice4">
                    <input type="text" class="form-control{{ $errors->has('choice5') ? ' is-invalid' : '' }} mb-4 col-10" name="choice5" value="{{ old('choice5') }}" required>
                    <input type="radio" class="col-1 mt-2 ml-3" name="check" value="choice5">
                    <button type="submit" class="btn btn-primary col-10">Submit</button> 
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
