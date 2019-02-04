@extends('admin.layout')

@section('content')
	<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Add New Event</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('events.index') }}"> Back</a>

        </div>

    </div>

</div>

   

@if ($errors->any())

    <div class="alert alert-danger">

        <strong>Whoops!</strong> There were some problems with your input.<br><br>

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

   

<form action="{{ route('events.index') }}" method="POST" enctype="multipart/form-data">
    @csrf
	  	

	  	<div class="form-group row">
	    	<label for="name" class="col-sm-2 col-form-label">Event Name</label>
	    	<div class="col-sm-8">
	      		<input type="text" class="form-control" id="name" name="name"placeholder="Enter Event Name">
	    	</div>
	  	</div>
	  	<div class="form-group row">
	    	<label for="type" class="col-sm-2 col-form-label">Event Type</label>
	    	<div class="col-sm-8">
	      		<input type="text" class="form-control" id="type" placeholder="Enter Event type" name="type">
	    	</div>
	  	</div>
	  	 <div class="form-group row">
	    	<label for="photo" class="col-sm-2 col-form-label">Event Photos</label>
	    	<div class="col-sm-8">
				<input type="file" id="photo" name="pic[]" multiple>
				
			</div>
	  	</div> 


	   	<div class="form-group row">
	   		<div class="col-sm-2">
	   		</div>
	   		<div class="col-sm-8">
	  		 	<button type="submit" class="btn btn-primary">Submit</button>
	  		 </div>
	    </div>
	    <input name="_token" type="hidden" value="{{ csrf_token() }}">
 
</form>
@stop