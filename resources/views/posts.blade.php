@extends('layouts.app')
 
@section('content')

	<div class=' col-sm-11 '>
		@foreach($posts as $post) 
		
			<div id='post' class='postcontainer col-sm-3 col-sm-offset-1'>
				<a href='/posts/{{$post->id}}'>{{$post->title}}</a>
				<img src="/images/{{ $post->image}}" width="100%" height="175px">
				<p>{{$post->content}}</p>
			</div>
			
		@endforeach
	</div>

@endsection
