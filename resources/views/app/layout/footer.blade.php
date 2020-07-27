<section id="footer" style="
    font-size: 16px;
    min-height: 55px;
    color: white;">
    	<div class="container">
<div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-6">
		    All Rights Reserved To Cachet Pharmaceuticals Pvt Ltd
		</div>
		<div class="col-md-2">
		</div>
</div>
</div>
</section>
		


<!-- Footer -->
<!--	<section id="footer">
		<div class="container">
			<div class="row text-center text-xs-center text-sm-left text-md-left">
				<div class="col-xs-12 col-sm-3">
					<ul class="list-unstyled quick-links">
						{{ HTML::image('images/footer-logo.png', 'footer image') }}
						</a>
						<p>Be part of the culture</p>
						<p>That values people</p>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-3">
					<h5>My Apps</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Email</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Attendance</a></li>
					</ul>


					<h5>Payroll</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Salary Slip</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Form 16</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Investment Declaration</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-3">
					<h5>HR</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Policy (PDF)</a></li>
					</ul>

					<h5>IT</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>IT Policy (PDF)</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-3">
					<h5>Contact</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>email@cachet.com</a></li>
						
					</ul>

					<h5>Address</h5>
					<ul class="list-unstyled quick-links">
						<p> xxx xxxxxxxxxxx #xx xx xxxxxxxxxxx xxxxx xxxx xxxxxxxxx xx xxxxx</p>
					</ul>
				</div>
			</div>
				
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
					<p class="h6">&copy 2018.<a class="text-green ml-2" href="#" target="_blank">Cachet</a></p>
				</div>
				</hr>
			</div>	
		</div>
	</section>-->
	<!-- ./Footer -->

	<!-- Modal -->
<div id="picModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Upload Profile pic</h4>
     
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
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
      <form action="{{  action('UserDashboardController@uploadimage') }}" method="POST" enctype="multipart/form-data">
       @csrf
            <div class="form-group row">
		   		<div class="col-sm-9">
		   		    User Profile
		   		</div>
		   		<div class="col-sm-3">
		  		 </div>
		    </div>
		    <div class="form-group row">
		    	<div class="col-sm-12">
					<input type="file" id="photo" name="pic">
				</div>
		  	</div>
		  	<div class="form-group row">
		   		<div class="col-sm-3">
		   		    Name
		   		</div>
		   		<div class="col-sm-9">
		   		    {{$userdata->name}}
		  		 </div>
		    </div>
		   <!-- <div class="form-group row">
		   		<div class="col-sm-3">
		   		    Emo code
		   		</div>
		   		<div class="col-sm-9">
		   		    {{$userdata->emp_code}}
		  		 </div>
		    </div>-->
		    <div class="form-group row">
		   		<div class="col-sm-3">
		   		    Designation
		   		</div>
		   		<div class="col-sm-9">
		   		     {{$userdata->designation}}
		  		 
		  		 </div>
		    </div>
		    <div class="form-group row">
		   		<div class="col-sm-3">
		   		    Department
		   		</div>
		   		<div class="col-sm-9">
		   		    {{$userdata->department}}
		  		 </div>
		    
		    </div>
		    <div class="form-group row">
		   		<div class="col-sm-3">
		   		    Location
		   		</div>
		   		<div class="col-sm-9">
		   		    {{$userdata->location}}
		  		 </div>
		    </div>
		    <div class="form-group row">
		   		<div class="col-sm-3">
		   		    Date of birth
		   		</div>
		   		<div class="col-sm-9">
		   		    {{$userdata->date_of_birth}}
		  		 </div>
		    </div>
		     <div class="form-group row">
		   		<div class="col-sm-3">
		   		    Mobile number
		   		</div>
		   		<div class="col-sm-9">
		   		    {{$userdata->mobile_no}}
		  		 </div>
		    </div>
		    <div class="form-group row">
		   		<div class="col-sm-3">
		   		    Email address
		   		</div>
		   		<div class="col-sm-9">
		   		    {{$userdata->email_id}}
		  		 </div>
		    </div>
            		    
   		    <div class="form-group row">
		   		<div class="col-sm-9">
		   		</div>
		   		<div class="col-sm-3">
		  		 	<button type="submit" class="btn btn-primary">Submit</button>
		  		 </div>
		    </div>
		      <input name="_token" type="hidden" value="{{ csrf_token() }}">
	  	</form>
	  </div>
    </div>

  </div>
</div>
@if ($errors->any())
<script type="text/javascript">
		$('#picModal').modal('show');
</script>
@endif
  {{ HTML::script('js/core.js') }}