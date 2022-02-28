@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card mb-2">
				<div class="card-body">
					<div class="row">
						<div class="col-md-4">
							<img class="img-thumbnail" src="{{ asset('assets/frontend/image/blog_post/post1.png') }}" alt="">
						</div>
						<div class="col-md-8">
							<h4><a href="">Post title</a></h4>
							<p>
								Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugit est necessitatibus rerum numquam illum, a nisi aliquid voluptates perferendis similique minus, ipsam veniam repellat autem nesciunt ducimus quidem consectetur pariatur. <span><a href="" class="btn btn-outline-info btn-sm">Readmore</a></span>
							</p>

						</div>
					</div>
				</div>
			</div>

			<ul class="pagination">
			    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
			    <li class="page-item"><a class="page-link" href="#">1</a></li>
			    <li class="page-item active"><a class="page-link" href="#">2</a></li>
			    <li class="page-item"><a class="page-link" href="#">3</a></li>
			    <li class="page-item"><a class="page-link" href="#">Next</a></li>
			</ul>
		</div>
		<div class="col-md-4">
			<div class="card mb-2">
				<div class="card-header">
					<h5>Category</h5>

				</div>
				<div class="card-body">
					<ul class="list-group">
						  <li class="list-group-item">Cras justo odio</li>
						  <li class="list-group-item">Dapibus ac facilisis in</li>
						  <li class="list-group-item">Morbi leo risus</li>
						  <li class="list-group-item">Porta ac consectetur ac</li>
						  <li class="list-group-item">Vestibulum at eros</li>
					</ul>
				</div>
			</div>

			<div class="card ">
				<div class="card-header">
					<h5>Recent Post</h5>

				</div>
				<div class="card-body">
					<ul class="list-group">
						  <li class="list-group-item">Cras justo odio</li>
						  <li class="list-group-item">Dapibus ac facilisis in</li>
						  <li class="list-group-item">Morbi leo risus</li>
						  <li class="list-group-item">Porta ac consectetur ac</li>
						  <li class="list-group-item">Vestibulum at eros</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
