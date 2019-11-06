@if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		</button>
        
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
            
    </div>
@endif


@if (Session::has('success'))
	<div class="alert alert-success">
		<p>{{ Session::get('success') }}</p>
	</div>
@endif

@if (Session::has('errors'))
    <div class="alert alert-danger">
        <p>{{ Session::get('errors') }}</p>
    </div>
@endif