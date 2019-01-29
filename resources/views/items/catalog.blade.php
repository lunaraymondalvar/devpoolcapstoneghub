@extends('layouts.app')

@section('title', 'Catalog Page')


@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	{{-- bootstrap cdn --}}
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
	<h1 class="text-center">Service Catalog Page</h1>


	<div class="container">
		<h2 class="text-center">Categories</h2>
		<div class="row">
			<div class="col-md-6 offset-md-4">
				<a href="#" class="btn btn-primary">All</a>
				@foreach(\App\Category::all() as $category)
					<a href="/menu/categories/{{$category->id}}" class="btn btn-primary">{{ $category->name }}</a>
				@endforeach
			</div>
		</div>
	</div>

	<hr>

	<div class="container">
		<a href="/menu/add" class="btn btn-success"> Add New SkillSet </a>

		@if(Session::has("success_message"))
			<div class="alert alert-success">{{ Session::get("success_message") }}</div>
		@endif



		<div class="row">
			@foreach($items as $indiv_item)
				<div class="col-sm-4">
					<div class="card">
						<h5 class="card-title text-center mt-3">{{ $indiv_item->name }}</h5>
						<div class="card-body">
							<img src="/{{$indiv_item->image_path}}" class="card-img-top">
							<p class="text-center mt-3">{{ $indiv_item->description }}</p>
							<p class="text-center">{{ $indiv_item->price }}</p>
							
							{{-- <form method="POST" action="/addToCart/{{ $indiv_item->id }}">
								{{ csrf_field() }}
								<div class="form-group">
									<label for="quantity">Quantity</label>
									<input type="number" name="quantity" id="quantity" class="form-control">
									<button class="btn btn-block btn-outline-success" type="submit"> Add To Cart </button>
								</div>
							</form> --}}

							<input type="number" name="quantity" id="quantity_{{$indiv_item->id}}" class="form-control">
							<button type="button" class="btn btn-block btn-outline-success" onclick="addToCart({{$indiv_item->id}})">Add to Cart</button>

							<a href="/menu/{{ $indiv_item->id }}" class="btn btn-block btn-primary">View Details</a>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <script>
    	function addToCart(id) {
    		let quantity = $("#quantity_"+id).val();
    		// console.log("Item ordered: " + id + " Quantity Ordered: " + quantity);
  
    		$.ajax({
    			"url": "/addToCart/"+id,
    			"type": "POST",
    			"data": {
    				'_token': "{{ csrf_token() }}",
    				'quantity': quantity

    			},
    			"success": function(data) {
    				alert("Current number of items in the cart is: " + quantity);
    			}

    		});

    	}
    </script>
	
</body>
</html>

@endsection