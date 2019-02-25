@extends('admin.layout')

@section('content')
	<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Employee birthday wishes</h2>

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

<form action="{{ route('wishes.store') }}" method="POST">
    @csrf
		<div class="form-group row">
	    	<label for="name" class="col-sm-2 col-form-label">Employee name</label>
	    	<div class="col-sm-8">
	      		<select class="form-control" id="emp_id" name="emp_id">
	      			@foreach ($empDetails as $key=>$empdata)
	      				<option value="{{$empdata['id']}}">{{$empdata['name']}}</option>
	      			@endforeach	
	      		</select>
	    	</div>
	  	</div>
	  	<div class="form-group row">
	    	<label for="type" class="col-sm-2 col-form-label">Comment</label>
	    	<div class="col-sm-8">
				<textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
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