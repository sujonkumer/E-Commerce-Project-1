@extends('Backend.layouts.mastertemplate')

@section('adminpagecontent')

	<!-- Begin Page Content -->
	<div class="container-fluid">

		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800">Manage All Category</h1>

		<div class="row">
			<div class="col-md-12">
				
				<div class="card shadow mb-4">
	                <div class="card-header py-3">
	                  <h6 class="m-0 font-weight-bold text-primary">View / Update / Delete Indivudual Category</h6>
	                </div>

	                <div class="card-body">
	                  	@include ('backend.allinfo.messages')
	                	<!-- View All Category Table Start -->
	                	<table class="table table-striped">
						  <thead class="thead-dark">
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Category Name</th>
						      <th scope="col">Description</th>
						      <th scope="col">Parent Category</th>
						      <th scope="col">Category Thumbnail</th>
						      <th scope="col">Action</th>
						    </tr>
						  </thead>
						  <tbody>

						  	@php
						  		$i = 1;
						  	@endphp
						  	@foreach ( $categories as $category )
								<tr>
							      <th scope="row">{{ $i }}</th>
							      <td>{{ $category->name }}</td>
							      <td>{{ $category->desc }}</td>
							      <td>
							      	@if ( $category->parent_id == NULL )
							      		Primary Category
							      	@else
							      		{{ $category->parent->name }}
							      	@endif
							      </td>
							      <td>
							      	@if ( $category->image == NULL )
							      		No Thumbnail
							      	@else
							      	<img src="{{ asset('image/category-image/' .$category->image) }}" width="100">
							      	@endif
							      </td>
							      <td>
							      	<div class="btn-group">
							      		<!-- Category Update Button -->
							      		<a href="{{ route('editcategory', $category->id) }}" class="btn btn-primary btn-sm">Update</a>

							      		<!-- Category Delete Button -->
							      		<a href="#deletecategory{{ $category->id }}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletecategory{{ $category->id }}">Delete</a>

							      		<!-- Category Delete Modal Content Start -->
										<div class="modal fade" id="deletecategory{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="exampleModalLabel">Do You Want to Delete The Category?</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body">
										        
										        <form action="{{ route('admin.category.delete', $category->id) }}" method="POST">

										        	{{ csrf_field() }}
										        	<button type="submit" class="btn btn-danger btn-block">Confirm Delete</button>
										        </form>

										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										        <button type="button" class="btn btn-primary">Save changes</button>
										      </div>
										        	}
										    </div>
										  </div>
										</div>
							      		<!-- Category Delete Modal Content END -->
							      	</div>
							      </td>
							    </tr>

							    @php
						  			$i++;
						  		@endphp
						  	@endforeach

						    

						  </tbody>
						</table>
						<!-- View All Category Table End -->

	                </div>
              </div>

			</div>
		</div>






		</div>
		<!-- /.container-fluid -->

@endsection