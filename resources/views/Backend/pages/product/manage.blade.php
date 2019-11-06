@extends('backend.layouts.mastertemplate')

@section('adminpagecontent')

	<!-- Begin Page Content -->
	<div class="container-fluid">

		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800">Manage All Products</h1>

		<div class="row">
			<div class="col-md-12">
				
				<div class="card shadow mb-4">
	                <div class="card-header py-3">
	                  <h6 class="m-0 font-weight-bold text-primary">View / Update / Delete Indivudual Products</h6>
	                </div>

	                <div class="card-body">
	                  	@include ('backend.allinfo.messages')
	                	<!-- View All Product Table Start -->
	                	<table class="table table-striped">
						  <thead class="thead-dark">
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Product Title</th>
						      <th scope="col">Price</th>
						      <th scope="col">Quantity</th>
						      <th scope="col">Status</th>
						      <th scope="col">Action</th>
						    </tr>
						  </thead>
						  <tbody>

						  	@php
						  		$i = 1;
						  	@endphp
						  	@foreach ( $products as $product )
								<tr>
							      <th scope="row">{{ $i }}</th>
							      <td>{{ $product->title }}</td>
							      <td>{{ $product->price }}</td>
							      <td>{{ $product->quantity }}</td>
							      <td>{{ $product->status }}</td>
							      <td>
							      	<div class="btn-group">
							      		<!-- Product Update Button -->
							      		<a href="{{ route('editproduct', $product->id) }}" class="btn btn-primary btn-sm">Update</a>

							      		<!-- Product Delete Button -->
							      		<a href="#deleteproduct{{ $product->id }}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteproduct{{ $product->id }}">Delete</a>

							      		<!-- Product Delete Modal Content Start -->
										<div class="modal fade" id="deleteproduct{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="exampleModalLabel">Do You Want to Delete The Product?</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body">
										        
										        <form action="{{ route('admin.product.delete', $product->id) }}" method="POST">

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
							      		<!-- Product Delete Modal Content END -->
							      	</div>
							      </td>
							    </tr>

							    @php
						  			$i++;
						  		@endphp
						  	@endforeach

						    

						  </tbody>
						</table>
						<!-- View All Product Table End -->

	                </div>
              </div>

			</div>
		</div>






		</div>
		<!-- /.container-fluid -->

@endsection