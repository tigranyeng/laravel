@extends('layouts.app')
 
@section('content')

	@foreach($posts as $post)

		<div id='post' class='postcontainer col-sm-3 col-sm-offset-1'>
			<a href='/posts/{{$post->id}}'>{{$post->title}}</a>
			<img src="/images/{{ $post->image}}" width="100%" height="auto">
			<p>{{$post->content}}</p>
		</div>
	@endforeach

@endsection
