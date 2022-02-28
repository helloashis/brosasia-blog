@extends('admin.layout')
@section('title','Post Options')
@section('content')

<div class="pagetitle">
    <h1>Post Options</h1>
    <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Post Options</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
   <div class="row">
      	@foreach($posts as $post)
      		<div class="col-lg-4">
	      		<div class="card">

		            <img width="100%" src="{{ asset('') }}/{{$post->thumbnail}}" class="card-img-top" alt="{{ $post->slug }}">
		            <div class="card-body">
		              	<h6 class="card-title h6">{{ $post->title }}</h6>
		              	{!! substr($post->content, 0,100) !!}
		            </div>
		            <div class="card-footer">
		            	<a href="{{ route('edit.post',$post->slug) }}" class="btn btn-success btn-sm">Edit</a>
		            	<a href="{{ route('delete.post',$post->id) }}" class="btn btn-outline-danger btn-sm delete-confirm">Delete</a>

		            </div>
		        </div><!-- End Card with an image on top -->
		    </div>
      	@endforeach

      	@if(count($posts)<=0)
      		<div class="alert alert-danger text-center">No data Found</div>
      	@endif

      	{{ $posts->links('layouts.pagination') }}
    </div>
</section>

@endsection