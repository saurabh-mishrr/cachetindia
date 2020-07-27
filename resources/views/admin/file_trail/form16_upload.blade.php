@extends('admin.layout')

@section('title', 'File Trail')

@section('content')

	<h1>Please wait...form 16 uploading</h1>
	<span>Warning: Do not refresh or close this operation.</span>

	<div class="progress">
	    <div class="bar"></div >
	    <div class="percent">0%</div >
	</div>

	<div id="status"></div>

	<form action="{{ route('upload-form16') }}" method="POST">
		@csrf
		<input type="hidden" name="id" value="{{ $id }}">
	</form>

@endsection('content')

@section('scripts')

	<script type="text/javascript">
		
		$(function(){

			$('form').submit();

			var bar = $('.bar');
		    var percent = $('.percent');
		    var status = $('#status');

		    $('form').ajaxForm({
		        beforeSend: function() {
		            status.empty();
		            var percentVal = '0%';
		            bar.width(percentVal);
		            percent.html(percentVal);
		        },
		        uploadProgress: function(event, position, total, percentComplete) {
		            var percentVal = percentComplete + '%';
		            bar.width(percentVal);
		            percent.html(percentVal);
		        },
		        complete: function(xhr) {
		            status.html(xhr.responseText);
		        }
		    });

		});

	</script>


@endsection('scripts')
