@extends("admin.layout")

@section('title', 'File Trail')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add File Trail</h2>
        </div>
    </div>
</div>
@if (session('error'))
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        {{ session('error') }}
    </div>
@elseif (session('success')) 
    <div class="alert alert-success">
        <strong>Hurrey!</strong><br><br>
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('filetrail.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  	<div class="form-group row">
    	<label for="name" class="col-sm-2 col-form-label">Type of Upload</label>
    	<div class="col-sm-8">
    		<select name="type_of_upload">
    			<option>Select option</option>
    			<option value="salary_slip" selected="selected">Salary Slip</option>
    			<option value="form_16">Form 16</option>
    		</select>
    	</div>
  	</div>
  	<div class="form-group row">
    	<label for="csv_file_path" class="col-sm-2 col-form-label">CSV file</label>
    	<div class="col-sm-8">
      		<input type="file" id="csv_file_path" name="csv_file_path">
    	</div>
  	</div>
  	<div class="form-group row">
    	<label for="tar_file_path" class="col-sm-2 col-form-label">TAR file</label>
    	<div class="col-sm-8">
      		<input type="file" id="tar_file_path" name="tar_file_path">
    	</div>
  	</div>
   	<div class="form-group row">
   		<div class="col-sm-2">
   		</div>
   		<div class="col-sm-8">
  		 	<button type="submit" class="btn btn-primary">Submit</button>
  		 </div>
    </div>
</form>
@endsection('content')