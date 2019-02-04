@extends ('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 col-xs-12">
            <h4 class="mb-3">Dashboard</h4>
            <div class="row">
                <div class="col-md-6 mb-3">
                    @if ($user->avatar != NULL)
                        <img src="{{ asset('storage/profile_images/'. $user->id. '.jpg') }}" class="w-100" style="objcet-fit:cover;">
                    @else
                        <img src="{{ asset('img/cat.jpg') }}" class="w-100" style="max-height: 400px; max-width: 400px;">
                    @endif
                </div>
                <div class="col-md-6">
                    <h5>{{ isset($user->name) ? $user->name : 'Guest user' }}</h5>
                    <p class="colour-primary">Learned {{ count($user->lessons()->get()) }} lessons</p>
                    <p><a href="{{ action('HomeController@wordsLearned') }}">Learned {{ $learned_words }} words</a></p>
                </div>
                <a href="{{ action('UserController@edit') }}" class="col-6 w-100 mb-3"><button class="btn btn-primary">Edit account</button></a>
            </div>
        </div>

        <div class="col-md-7 col-xs-12 border">
            <h4 class="my-4">Activities</h4>
            <hr>
            <div class="row mb-2">
                <div class="h-100 ml-2 col-xs-4"><img src="{{asset('img/cat.jpg')}}" style="max-height: 100px; max-width: 100px;"></div>
                <div class="h-100 ml-2 my-auto col-xs-8">
                <p><a href="#">You</a> learned 20 of 20 words in <a href="#">Basic 500</a></p>
                <p style="color: grey;">2 days ago</p>
            </div>
        </div>    

        <div class="row mb-2">
            <div class="h-100 ml-2 col-xs-4"><img src="{{asset('img/cat.jpg')}}" style="max-height: 100px; max-width: 100px;"></div>
            <div class="h-100 ml-2 my-auto col-xs-8">
                <p><a href="#">You</a> learned 20 of 20 words in <a href="#">Basic 500</a><p>
                <p style="color: grey;">2 days ago</p>
            </div>
        </div>    
    </div>


</div>
@endsection