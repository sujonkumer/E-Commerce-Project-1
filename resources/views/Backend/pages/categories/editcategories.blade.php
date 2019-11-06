@extends('Backend.layouts.mastertemplate')

@section('adminpagecontent')

	<!-- Begin Page Content -->
	<div class="container-fluid">

		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800">Edit Category</h1>

		<div class="row">
			<div class="col-md-12">
				
				<div class="card shadow mb-4">
	                <div class="card-header py-3">
	                  <h6 class="m-0 font-weight-bold text-primary">Edit The Category Name</h6>
	                </div>

	                <div class="card-body">
	                  
	                	<form action="{{ route('admin.category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                		@csrf
                		@include ('Backend.allinfo.messages')
	                	
	                		<div class="form-group">
	                			<label for="title">Title</label>
	                			<input type="text" name="name" class="form-control" value="{{ $category->name }}">
	                		</div>

	                		<div class="form-group">
	                			<label for="description">Description</label>
	                			<textarea class="form-control" name="description" rows="5" cols="50">{{ $category->desc }}</textarea>
	                		</div>

	                		<div class="form-group">
	                			<label for="parent_category">Parent Category</label>
	                			<select class="form-control" name="parent_id">
	                				<option value="">Please Select a Primary Category</option>
	                				@foreach ($primary_categories as $cat)
	                					<option value="{{ $cat->id }}" {{ $cat->id == $category->parent_id? 'selected' : '' }}>{{ $cat->name }}</option>
	                				@endforeach
	                			</select>
	                		</div>

	                		<div class="form-group">
	                			<label for="category_image">Category Image</label>
	                			@if ( $category->image == NULL )
						      		No Thumbnail
						      	@else
						      		<img src="{{ asset('image/category-image/' .$category->image) }}" width="100">
						      	@endif
	                			<br><br>

	                			<label for="image">Category New Image</label>
	                			<input type="file" class="form-control" name="image" id="image">
	                		</div>

	                		<div class="form-group">
	                			<input type="submit" name="editCategory" value="Update Category" class="btn btn-primary btn-block">
	                		</div>
	                	</form>


	                </div>
              </div>

			</div>
		</div>






		</div>
		<!-- /.container-fluid -->

@endsection