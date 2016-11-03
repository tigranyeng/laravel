@extends('layouts.app')

@section('content')

  <form class='col-md-6 col-md-offset-3' action="{{route('postStore')}}" method='post' enctype='multipart/form-data'>
    @if (count($errors) > 0)

      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>

    @endif
    <div class="form-group">
      <h1 >Add post</h1>
      <label >Title</label>
      <input type="text" class="form-control" id="title" placeholder="Title" name='title'>
    </div>
    <div class="form-group">
      <label >Content</label>
      <textarea class="form-control" id="desc" placeholder="Description" name='content'></textarea>
    </div>
    <div class="form-group ">
      <label >Image</label>
      <input type="file" id="file" name='image'>
    </div>
    <div>
      <button type="submit" class="btn btn-default col-md-12">Add</button>
    </div>
    {{csrf_field()}}
  </form>

@endsection