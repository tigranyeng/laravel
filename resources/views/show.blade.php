@extends('layouts.app')

@section('content')

	<div id='post' class='postcontainer col-sm-8 col-sm-offset-2'>
		<h1>{{$post->title}}</h1>
		<img src="/images/{{ $post->image}}" width="100%" height="auto">
	 	<p>{{$post->content}}</p>
	 
		@if (Auth::user()->id == $post->user_id)

			 <div class='row'>
				<div id='options_div' class='col-xs-8 col-xs-offset-4 col-sm-6 col-md-5 col-md-offset-4 col-lg-offset-8 col-lg-4'>
					<a class="btn btn-default col-xs-8 col-xs-offset-4 col-sm-5 col-sm-offset-1" href="/edit_form/{{$post->id}}" role="button">Edit Post</a>
					<form action='/delete/{{$post->id}}' method='post'>
						<input type='hidden' name='_method' value='DELETE'>
						{{csrf_field()}}
						<button class="btn btn-danger col-sm-5 col-sm-offset-1 col-xs-8 col-xs-offset-4 " type='submit'>Delete Post</button>
					</form>
				
				</div>
			</div>

		@endif
	</div>
	
@endsection