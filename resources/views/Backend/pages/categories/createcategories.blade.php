@extends('Backend.layouts.mastertemplate')

@section('adminpagecontent')

	<!-- Begin Page Content -->
	<div class="container-fluid">

		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800">Add New Category</h1>

		<div class="row">
			<div class="col-md-12">
				
				<div class="card shadow mb-4">
	                <div class="card-header py-3">
	                  <h6 class="m-0 font-weight-bold text-primary">Add New Category</h6>
	                </div>

	                <div class="card-body">
	                  
	                	<form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
                		@include ('Backend.allinfo.messages')

	                		<div class="form-group">
	                			<label for="title">Title</label>
	                			<input type="text" name="name" class="form-control" placeholder="Category Name">
	                		</div>

	                		<div class="form-group">
	                			<label for="description">Description</label>
	                			<textarea class="form-control" name="description" rows="5" cols="50" placeholder="Category Description"></textarea>
	                		</div>

	                		<div class="form-group">
	                			<label for="parent_category">Parent Category</label>
	                			<select class="form-control" name="parent_id">
	                					<option value="">Please Select a Primary Category</option>
	                				@foreach ($primary_categories as $category)
	                					<option value="{{ $category->id }}">{{ $category->name }}</option>
	                				@endforeach
	                			</select>
	                		</div>

	                		<div class="form-group">
	                			<label for="category_image">Image</label>
	                			<input type="file" class="form-control" name="image" id="image">
	                		</div>

	                		<div class="form-group">
	                			<input type="submit" name="addCategory" value="Add Category" class="btn btn-primary btn-block">
	                		</div>
	                	</form>


	                </div>
              </div>

			</div>
		</div>






		</div>
		<!-- /.container-fluid -->

@endsection