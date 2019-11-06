@extends('backend.layouts.mastertemplate')

@section('adminpagecontent')

	<!-- Begin Page Content -->
	<div class="container-fluid">

		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800">Edit Product</h1>

		<div class="row">
			<div class="col-md-12">
				
				<div class="card shadow mb-4">
	                <div class="card-header py-3">
	                  <h6 class="m-0 font-weight-bold text-primary">Edit The Product With Proper Information</h6>
	                </div>

	                <div class="card-body">
	                  
	                	<form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                		@include ('backend.allinfo.messages')
	                	{{ csrf_field() }}
	                		<div class="form-group">
	                			<label for="title">Title</label>
	                			<input type="text" name="title" class="form-control" value="{{ $product->title }}">
	                		</div>

	                		<div class="form-group">
	                			<label for="description">Description</label>
	                			<textarea class="form-control" name="description">{{ $product->description }}</textarea>
	                		</div>

	                		<div class="form-group">
	                			<label for="quantity">Quantity</label>
	                			<input type="text" name="quantity" class="form-control" value="{{ $product->quantity }}">
	                		</div>

	                		<div class="form-group">
	                			<label for="price">Price</label>
	                			<input type="text" name="price" class="form-control" value="{{ $product->price }}">
	                		</div>

	                		<div class="form-group">
	                			<label for="offerprice">Offer Price</label>
	                			<input type="text" name="offerprice" class="form-control" value="{{ $product->offer_price }}">
	                		</div>

	                		<!-- Upload Multiple Image Start -->
	                		<div class="form-group">
	                			<label for="product_image">Upload Product Image</label>
	                			<input type="file" name="product_image[]" class="">
	                		</div>
	                		<div class="form-group">
	                			<label for="product_image">Upload Product Image</label>
	                			<input type="file" name="product_image[]" class="">
	                		</div>
	                		<div class="form-group">
	                			<label for="product_image">Upload Product Image</label>
	                			<input type="file" name="product_image[]" class="">
	                		</div>
	                		<div class="form-group">
	                			<label for="product_image">Upload Product Image</label>
	                			<input type="file" name="product_image[]" class="">
	                		</div>
	                		<div class="form-group">
	                			<label for="product_image">Upload Product Image</label>
	                			<input type="file" name="product_image[]" class="">
	                		</div>
	                		<div class="form-group">
	                			<label for="product_image">Upload Product Image</label>
	                			<input type="file" name="product_image[]" class="">
	                		</div>
	                		<!-- Upload Multiple Image End -->



	                		<div class="form-group">
	                			<input type="submit" name="editProduct" value="Update Product" class="btn btn-primary btn-block">
	                		</div>
	                	</form>


	                </div>
              </div>

			</div>
		</div>






		</div>
		<!-- /.container-fluid -->

@endsection