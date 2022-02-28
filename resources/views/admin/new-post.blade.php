@extends('admin.layout')
@section('title','New Post Options')
@section('content')

<div class="pagetitle">
    <h1>New Post</h1>
    <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item ">Post Options</li>
          <li class="breadcrumb-item active">New Post</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
   <div class="row">
   		<div class="col-md-12">
   			<div class="card">

   				<form action="{{ route('save.post') }}" method="POST" enctype="multipart/form-data">
   					@csrf
   					<div class="card-body">
   						<div class="card-title">Add New Post</div>
   						<div class="form-group row">
   							<div class="col-md-6">
   								<label for="title" class="form-label">Post Title</label>
   								<input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Post title here..." id="title" required autofocus>
   								@error('title')
                                    <div class="is-invalid">
                                        {{ $message }}
                                    </div>
   								@enderror
   							</div>
                            <div class="col-md-3">
                                <label for="category" class="form-label">Category</label>
                                <select name="category" required id="category" class="form-control">
                                    <option selected>======Select One======</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <div class="is-invalid">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label for="subcategory" class="form-label">Sub Category</label>
                                <select name="subcategory" required id="subcategory" class="form-control">


                                </select>
                                @error('subcategory')
                                    <div class="is-invalid">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
   						</div>
                        <div class="form-group row">
                            <div class="col-md-8">
                                <label for="content" class="form-label mt-3">Post Content</label>
                                <textarea name="content" id="content" cols="30" rows="5" class="tinymce-editor"></textarea>
                            </div>
                            <div class="col-md-4">
                                <label for="frame" class="form-label mt-3" title="Size: Recommanded 314x150">Thumbnail <input type="file" name="image" class="uploadFile" onchange="preview()"></label>
                                <div class="imgUp">
                                    <img width="100%" height="165px" src="" id="frame" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <div class="col-md-2">
                                <label for="status" class="form-label">Status/Visibility</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" selected>Published</option>
                                    <option value="0">Save Draft</option>

                                </select>
                            </div>
                        </div>
   					</div>
   					<div class="card-footer">
   						<button type="submit" class="btn btn-success btn-sm"><i class="bi bi-save"></i> Submit</button>
   						<button type="reset" class="btn btn-danger btn-sm"><i class="bi bi-circle"></i> Cancel</button>
   					</div>

   				</form>
   			</div>
   		</div>
    </div>
</section>

@endsection