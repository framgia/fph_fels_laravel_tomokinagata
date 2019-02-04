@extends ('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-5">
            <div class="col-12 mb-3">
                <img src="{{asset('img/cat.jpg')}}" class="w-100" style="max-height: 400px; max-width: 400px;">
            </div>
            <div class="col-12 text-center">
                <h5>John Doe</h5>
                <hr>
                <div class="row">
                    <div class="col-6 mb-3">
                        <p>50<br>followers</p>
                    </div>
                    <div class="col-6">
                        <p>20<br>following</p>
                    </div>
                </div>
                <a href="#"><button class="btn btn-primary w-100 mb-3">UNFOLLOW</button></a>
                <a href="#">20 words learned</a>
            </div>
        </div>

        <div class="col-sm-7 border">
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