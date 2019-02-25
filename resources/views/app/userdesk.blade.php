@extends('app.layout.main')

@section('content')
<div class="container-fluid">
  	<div class="row">
		<div class="col-md-3">
			<div class="card">
				<div class="card-header bg-red">Quick Links</div>
				<div class="card-body quicklink-section">
					<div class="nav-side-menu">
						<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
						<div class="menu-list">  
							<ul id="menu-content" class="menu-content collapse out">
								<li>
									<a href="{{Config::get('constants.links.home')}}"><i class="fas fa-tachometer-alt fa-lg"></i> Home </a>
								</li>

							<li  data-toggle="collapse" data-target="#products" class="collapsed">
							  <a href="#"><i class="fab fa-studiovinari fa-lg"></i> My Apps <span class="arrow"></span></a>
							</li>
							<ul class="sub-menu collapse" id="products">
								<li class="active"><a href="{{Config::get('constants.links.mail')}}">Email</a></li>
								<li class="active"><a href="{{Config::get('constants.links.attendance')}}">Attendance</a></li>
								<li class="active"><a href="{{Config::get('constants.links.doctor')}}">Hi Doctor</a></li>
							</ul>

							<li data-toggle="collapse" data-target="#service" class="collapsed">
							  <a href="#"><i class="fab fa-fort-awesome-alt fa-lg"></i> Payroll <span class="arrow"></span></a>
							</li>  
							<ul class="sub-menu collapse" id="service">
								<li class="active"><a href="{{action('UserDashboardController@downloadSalary') }} "  class="sal-slip">Salary Slip</a></li>
								<li class="active"><a href="#"  class="form-16"target="downloadFrame">Form 16</a></li>
								<li class="active"><a href="#"  class="invest-dec" target="downloadFrame">Investment Declartion</a></li>
							</ul>


							<li data-toggle="collapse" data-target="#hr" class="collapsed">
							  <a href="#"><i class="fab fa-pagelines fa-lg"></i> HR <span class="arrow"></span></a>
							</li>
							<ul class="sub-menu collapse" id="hr">
							  <li class="active"><a href="#">Policy (PDF)</a></li>
							</ul>

							<li data-toggle="collapse" data-target="#it" class="collapsed">
							  <a href="#"><i class="fab fa-pagelines fa-lg"></i> IT <span class="arrow"></span></a>
							</li>
							<ul class="sub-menu collapse" id="it">
							  <li class="active"><a href="#">IT Policy (PDF)</a></li>
							</ul>

							<li><a href="#"><i class="fas fa-user-tie fa-lg"></i>Learning and Development</a></li>
						</ul>
					</div>
				</div>
			</div>			    
		</div>
		
		
		<div class="card">
			<div class="card-header bg-red">Mediclaim Toll Free</div>
			<div class="card-body">
				<div class="Mediclaim-info">
					<h5>Customer Care No</h5>
					<p>1800 233 1166</p>
				</div>

				<div class="Mediclaim-info">
					<h5>Cashless No</h5>
					<p>1800 233 4505</p>
				</div>
			</div> 
		</div>
		
		
		<div class="card">
			<div class="card-header bg-red">Photo Gallery</div>
			<div class="card-body galley-section">
				<div class="bxslider">
				@foreach($gallarydata as $data)
				  <div> {{ HTML::image('images/events/'.$data->pic, 'name',array('width'=>300,'height'=>300)) }}
						</div>
						@endforeach
				</div>
			</div>			    
		</div>
	</div>
	<div class="col-md-6">
		
			<div class="card">
				<div class="card-header bg-blue">Welcome to Cachet Employee Portal </div>
				<div class="card-body welcome-section">
					<p class="darkinfo">{{ $achievedata[0]->content }}

 					</p>
				</div> 
				
			</div>
				
			<div class="card">
				<div class="card-header bg-blue">Achivements</div>
				<div class="card-body achivements-section">
					  {{ HTML::image('images/'.$achievedata[0]->pic,'Achivements') }}
						
				</div> 
				
			</div>
				
			<div class="card">
				<div class="card-header bg-blue">Quote for a thought</div>
				<div class="card-body quote-section today-quotes">
					<div class="quote">
						<h5>
							<?php echo $quotes['description'];?>
						</h5>
						<center><h5>
							<?php echo $quotes['title'];?>
						</h5>	
						</center>
					</div>
				</div> 
				
			</div>
	</div>
	<div class="col-md-3">
		
			<div class="card">
				<div class="card-header bg-red">News & Events</div>
				<div class="card-body list-section">
					<ul class="newsslider">
						<?php
						foreach ($newsdata as  $key => $value) {
         		      		echo '<li type="square">'.$value['title'].'</li>';
  						} ?>
					</ul>
				</div> 
				
			</div>
				
			<div class="card">
				<div class="card-header bg-red">Birthday Wishes</div>
				<div class="card-body birthday-section">
					@foreach ($birthWishesData as $data)
						<div class="media border p-3">
						@if(file_exists("images/user/".$data->photo)) 
						   	{{ HTML::image('images/user/'.$data->photo,'user pic',array("class"=>'mr-3 rounded-circle')) }}
	
						@else
						   	{{ HTML::image('images/user/default-user.png','user pic',array("class"=>'mr-3 rounded-circle')) }}
	
						@endif
							<div class="media-body">
							  <h4>{{$data->name}}</h4>
							  <p>{{$data->comment}}</p>      
							</div>
						</div>
					@endforeach	
				</div> 
				
			</div>
				
			<!--<div class="card">
				<div class="card-header bg-red">Important Notice</div>
				<div class="card-body list-section">
					<ul>
						<li>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.</li> 
						<li>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.</li> 
					</ul>
				</div> 
				
			</div>-->

			
			<div class="card">
				<div class="card-header bg-red">New Joinee</div>
				<div class="card-body joinee-section">
					<div class="joinslider">
				  			<div> 
					  		   	{{ HTML::image('images/user/default-user.png','user pic',array("class"=>'mr-3 rounded-circle',"title"=>"<h5>Joinee Name</h5>
								<p>Department Name</p>")) }}
							</div>
							<div> 
					  		   	{{ HTML::image('images/user/1.jpg','user pic',array("class"=>'mr-3 rounded-circle',"title"=>"<h5>Jayesh</h5>
								<p>Account</p>")) }}
							</div>
					</div>
						
				</div> 
			</div>
	</div>
  </div>
</div>

@stop

<iframe src="" name="downloadFrame" height="200px" width="500px" style="display: none"></iframe>
