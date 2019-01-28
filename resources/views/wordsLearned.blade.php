@extends ('layouts.app')

@section('title', 'Dashboard | words leaned')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 col-sm-12">
            <h4 class="mb-3">Dashboard</h4>
            <div class="row">
                <div class="col-md-6 mb-3">
                    @if ($user->avatar != NULL)
                        <img src="/storage/profile_images/{{ $user->id }}.jpg" class="w-100" style="objcet-fit:cover;">
                    @else
                        <img src="{{ asset('img/cat.jpg') }}" class="w-100" style="max-height: 400px; max-width: 400px;">
                    @endif
                </div>
                <div class="col-md-6">
                    <h5>{{ isset($user->name) ? $user->name : 'Guest user' }}</h5>
                    <p class="colour-primary">Learned {{ count($user->lessons()->get()) }} lessons</p>
                </div>
                <a href="{{ action('UserController@edit') }}" class="col-6 w-100 mb-3"><button class="btn btn-primary">Edit account</button></a>
            </div>
        </div>

        <div class="col-md-7 col-sm-12 border">
            <h4 class="my-4">Words Learned</h4>
            <hr>
            <div class="row">
                <table class="col-md-6 col-xs-12 border-right">
                    <thead class="px-3">
                        <tr><th><h5 class="py-2 ml-3">Words</h5></th><th><h5>Answers</h5></th></tr>
                    </thead>
                    <tbody>
                        @foreach (array_map(null, $words, $word_answers) as [$word, $word_answer])
                            @if ($loop->iteration == 21)
                                   </tbody>
                                </table>
                                <table class="col-md-6 col-xs-12 text-center mb-3">
                                    <tbody>
                                        <tr><th>Words</th><th>Answers</th></tr>
                            @endif
                            <tr><td><h5 class="py-1 ml-3">{{ $word }}</h5></td><td><p class="py-1">{{ $word_answer }}</p></td></tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>    
    </div>
</div>
@endsection