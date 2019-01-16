@extends ('layouts.app')

@section('title', 'Categories')

@section('admin_mark', ' | Admin')

@section('content')
<div class="container">
    <h3 class="mb-5">Categories
    <?php $url_add = url('/admin/category/add'); ?>
    <button class="btn btn-primary float-right" onclick="location.href='<?= $url_add; ?>'">Add new category</button>
    </h3>

    <section>
        <table class="table table-hover">
          <thead>
              <tr><th>Title</th><th>Description</th><th>Action</th></tr>
          </thead>

          <tbody>
              @foreach ($categories as $category)
                  <tr>
                      <td><a href="{{ action('WordController@index', $category) }}">{{$category->title}}</a></td>
                      <td>{{$category->description}}</td>
                      <td>
                          <a href="{{ action('WordController@add', $category) }}">Add word</a> | 
                          <a href="{{ action('CategoryController@edit', $category) }}">Edit</a> | 
                          <a href="{{ action('CategoryController@delete', $category) }}" onclick="return confirm('Are you sure?')">Delete</a>
                      </td>
                  </tr>
               @endforeach
          </tbody>
        </table>
        <span class="float-right">{{ $categories->links() }}</span>
    </section>
</div>
@endsection
