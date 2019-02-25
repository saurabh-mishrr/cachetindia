@extends('admin.layout')

@section('content')
	<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Achievement</h2>

        </div>

       <!--  <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('achievement.index') }}"> Back</a>

        </div>
 -->
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

<form action="{{ route('achievement.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
		<div class="form-group row">
	    	<label for="name" class="col-sm-2 col-form-label">Content</label>
	    	<div class="col-sm-8">
				<textarea class="form-control" rows="5" id="content" name="content"></textarea>
	    	</div>
	  	</div>
	  	<div class="form-group row">
	    	<label for="type" class="col-sm-2 col-form-label">Acheivement pic</label>
	    	<div class="col-sm-8">
				<input type="file" id="photo" name="pic">
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