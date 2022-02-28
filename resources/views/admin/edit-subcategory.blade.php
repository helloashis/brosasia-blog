@extends('admin.layout')
@section('title','Sub-Category Options')
@section('content')

<div class="pagetitle">
    <h1>Sub-Category Options</h1>
    <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item">Sub-Category Options</li>
          <li class="breadcrumb-item active">Edit Sub-Category</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
   <div class="row justify-content-center">
      	<div class="col-md-6">
      		<div class="card">
      			<form action="{{ route('update.subcategory') }}" method="post">
      				@csrf
      				<div class="card-body p-3">

      					<div class="form-group">
		                    <label for="category">Main Category</label>
							<select name="category" id="category" class="form-control @error('category') is-invalid @enderror">
		            			<option selected>===Select One===</option>
		            			@foreach($categories as $category)
		            			<option value="{{$category->id}}" @if($category->id==$edit_info->cat_id) selected @endif>{{$category->title }}</option>
		            			@endforeach
		            		</select>

		                    <input type="hidden" name="id" value="{{$edit_info->id}}}">
		                    @error('title')
		                        {{ Toastr::warning($message, 'Warning', ["positionClass" => "toast-top-right"]); }}
		                    @enderror
		                </div>

      					<div class="form-group">
		                    <label for="title">Sub-Category Title <small>(Note: Maximum 35 Characters)</small></label>
		                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter the category name" autofocus required value="{{ $edit_info->title }}">
		                    <input type="hidden" name="id" value="{{$edit_info->id}}">
		                    @error('title')
		                        {{ Toastr::warning($message, 'Warning', ["positionClass" => "toast-top-right"]); }}
		                    @enderror
		                </div>
      				</div>
      				<div class="card-footer">
      					<a href="{{ route('subcategory') }}" class="btn btn-default btn-sm">Return Back</a>

      					<button type="submit" class="btn btn-success btn-sm">Update</button>
      				</div>
      			</form>

      		</div>
      	</div>
    </div>
</section>

@endsection
