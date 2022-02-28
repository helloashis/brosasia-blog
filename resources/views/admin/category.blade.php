@extends('admin.layout')
@section('title','Category Options')
@section('content')

<div class="pagetitle">
    <h1>Category Options</h1>
    <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Category Options</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
   <div class="row">
      	<div class="col-lg-12">
      		<div class="card">
      			<div class="card-header">
      				<i class="far fa-tag"></i>
      				<h5>Category List</h5>
                    <a href="" class="btn btn-primary btn-sm " class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categorymodal">Add New</a>
      			</div>
      			<div class="card-body">

      				<table class="table table-bordered datatable">
      					<thead>
      						<tr>
      							<th>SL</th>
      							<th>Category Name</th>
      							<th width="15%">Action</th>
      						</tr>
      					</thead>
      					<tbody>
      						@foreach($categories as $key =>$category)
      						<tr>
      							<td>
                                    {{ $key+1 }}
      							</td>
      							<td>
                                    {{ $category->title }}
      							</td>
      							<td class="text-center">
      								<a href="{{ route('edit.category',$category->slug) }}" class="btn btn-outline-info btn-sm">Edit</a>
      								<a href="{{ route('delete.category',$category->slug) }}" class="btn btn-outline-danger btn-sm delete-confirm">Delete</a>
      							</td>
      						</tr>

      						@endforeach

      						@if(count($categories)<=0)
          						<tr>
          							<td colspan="3" class="text-center bg-danger text-white">No data found</td>
          						</tr>

      						@endif
      					</tbody>
      				</table>
      			</div>
      		</div>
      	</div>
    </div>
</section>

<div class="modal fade" id="categorymodal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('save.category') }}"  method="post">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="title">Category Title <small>(Note: Maximum 35 Characters)</small></label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter the category name" autofocus required>
                    @error('title')
                        {{ Toastr::warning('This category has been already taken', 'Warning', ["positionClass" => "toast-top-right"]); }}
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
      </div>
    </div>
  </div><!-- End Vertically centered Modal-->

@endsection
