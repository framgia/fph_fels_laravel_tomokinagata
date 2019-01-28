@extends ('layouts.app')

@section('title', 'Categories')

@section('admin_mark', ' | Admin')

@section('content')
<div class="container">
    <h3 class="mb-5">Words in {{ $category->title }}</h3>
    <section>
        <table class="table table-hover">
            <thead>
                <tr><th>Word</th><th>Answer</th><th>Action</th></tr>
            </thead>
            <tbody>
                @foreach ($words as $word)
                    <tr>
                        <td>{{ $word->content }}</td>
                        <td>{{ $word->wordAnswers->where('correct', 1)->first()->content }}</td>
                        <td>
                            <a href="{{ action('WordController@edit', $word) }}}">Edit</a> | 
                            <a href="{{ action('WordController@delete', $word) }}" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</div>
@endsection
