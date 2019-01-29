
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add Item Page</title>

	{{-- Bootstrap cdn --}}
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
	<h1 class="text-center">Add Item Page</h1>

	<div class="container">
		<div class="row">
			@if(count($errors) > 0)
				@foreach($errors->all() as $error)
					<p>{{ $error }}</p>
				@endforeach
			@endif	
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-sm-8 offset-sm-2">
				<form action="" enctype="multipart/form-data" method="POST">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" name="name" class="form-control" id="name" required>
					</div>

					<div class="form-group">
						<label for="description">Description</label>
						<textarea type="text" class="form-control col-8" rows="5" name="description" id="description"></textarea>
					</div>

					<div class="form-group">
						<label for="price">Price</label>
						<input type="number" name="price" class="form-control" min="0" id="price" required>
					</div>

					<div class="form-group">
						<label for="categories">Category</label>
						<select class="form-control col-8" name="category" id="category" required>
							@foreach ($categories as $category)
								<option value="{{ $category->id }}"> {{ $category->name }} </option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label for="image">Upload Image</label>
						<input type="file" id="image" class="form-control" name="image" required>
					</div>
					<button type="submit" class="btn btn-block bg-success">Add New Item</button>
				</form>
			</div>
		</div> <!-- end of row -->	
	</div> <!-- end of container -->

</body>
</html>