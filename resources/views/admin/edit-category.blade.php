@extends('admin.layout')
@section('title','Category Options')
@section('content')

<div class="pagetitle">
    <h1>Category Options</h1>
    <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item">Category Options</li>
          <li class="breadcrumb-item active">Edit Category</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
   <div class="row justify-content-center">
      	<div class="col-md-6">
      		<div class="card">
      			<form action="{{ route('update.category') }}" method="post">
      				@csrf
      				<div class="card-body p-3">
      					<div class="form-group">
		                    <label for="title">Category Title <small>(Note: Maximum 35 Characters)</small></label>
		                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter the category name" autofocus required value="{{ $edit_info->title }}">
		                    <input type="hidden" name="id" value="{{$edit_info->id}}}">
		                    @error('title')
		                        {{ Toastr::warning('This category has been already taken', 'Warning', ["positionClass" => "toast-top-right"]); }}
		                    @enderror
		                </div>
      				</div>
      				<div class="card-footer">
      					<a href="{{ route('category') }}" class="btn btn-default btn-sm">Return Back</a>

      					<button type="submit" class="btn btn-success btn-sm">Update</button>
      				</div>
      			</form>

      		</div>
      	</div>
    </div>
</section>

@endsection
