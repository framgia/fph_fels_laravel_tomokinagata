@extends ('layouts.app')

@section('title', 'Categories')

@section('content')
<div class="container">
    <h3 class="mb-3">Categories</h3>
    <div class="row">
        @foreach($categories as $category)
            <div class="col-md-6 col-xs-12 p-3">
                <div class="border h-100 p-2  bg-white rounded d-flex flex-column">
                    <h4 class="">{{ $category->title }}</h4>
                    <p>{{ $category->description }}</p>
                    <a class="mt-auto" href="{{ route('lessonAnswer', ['category' => $category->id, 'page_number' => 0, 'correct' => 0]) }}">
                        <button class="btn btn-primary w-25">Start</button>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <span class="float-right">{{ $categories->links() }}</span>
</div>
@endsection
