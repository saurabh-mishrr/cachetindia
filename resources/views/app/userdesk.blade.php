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
									<a href="index.html"><i class="fas fa-tachometer-alt fa-lg"></i> Home </a>
								</li>

							<li  data-toggle="collapse" data-target="#products" class="collapsed">
							  <a href="#"><i class="fab fa-studiovinari fa-lg"></i> My Apps <span class="arrow"></span></a>
							</li>
							<ul class="sub-menu collapse" id="products">
								<li class="active"><a href="#">Email</a></li>
								<li class="active"><a href="#">Attendance</a></li>
								<li class="active"><a href="#">Hi Doctor</a></li>
							</ul>

							<li data-toggle="collapse" data-target="#service" class="collapsed">
							  <a href="#"><i class="fab fa-fort-awesome-alt fa-lg"></i> Payroll <span class="arrow"></span></a>
							</li>  
							<ul class="sub-menu collapse" id="service">
								<li class="active"><a href="#">Salary Slip</a></li>
								<li class="active"><a href="#">Form 16</a></li>
								<li class="active"><a href="#">Investment Declartion</a></li>
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
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<div class="carousel-item active">
						  {{ HTML::image('images/gallery.jpg', 'name',array('width'=>1100,'height'=>500)) }}
						</div>
						<div class="carousel-item">
						  {{ HTML::image('images/gallery.jpg', 'name',array('width'=>1100,'height'=>500)) }}
						
						</div>
						<div class="carousel-item">
						  {{ HTML::image('images/gallery.jpg', 'name',array('width'=>1100,'height'=>500)) }}
						
						</div>
					</div>
					  
					<a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
						<span class="carousel-control-prev-icon"></span>
					</a>
					<a class="carousel-control-next" href="#myCarousel" data-slide="next">
						<span class="carousel-control-next-icon"></span>
					</a>
				</div>
			</div>			    
		</div>
	</div>
	<div class="col-md-6">
		
			<div class="card">
				<div class="card-header bg-blue">Welcome to Cachet Employee Portal </div>
				<div class="card-body welcome-section">
					<p class="darkinfo">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p> 

					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>

					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>

 					</p>
				</div> 
				
			</div>
				
			<div class="card">
				<div class="card-header bg-blue">Achivements</div>
				<div class="card-body achivements-section">
					  {{ HTML::image('images/achivement.jpg','Achivements') }}
						
				</div> 
				
			</div>
				
			<div class="card">
				<div class="card-header bg-blue">Quote for a thought</div>
				<div class="card-body quote-section">
					<div class="quote">
						  {{ HTML::image('images/quote.png','quote') }}
					</div>
				</div> 
				
			</div>
	</div>
	<div class="col-md-3">
		
			<div class="card">
				<div class="card-header bg-red">News & Events</div>
				<div class="card-body list-section">
					<ul>
						<li>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.</li> 
						<li>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.</li> 
					</ul>
				</div> 
				
			</div>
				
			<div class="card">
				<div class="card-header bg-red">Birthday Wishes</div>
				<div class="card-body birthday-section">
					@foreach ($birthWishesData as $data)
						<div class="media border p-3">
						 <img src="images/{{$data->profile_pic}}" class="mr-3 rounded-circle"></img>
							<div class="media-body">
							  <h4>{{$data->emp_name}}</h4>
							  <p>{{$data->comment}}</p>      
							</div>
						</div>
					@endforeach	
				
					
					
				</div> 
				
			</div>
				
			<div class="card">
				<div class="card-header bg-red">Important Notice</div>
				<div class="card-body list-section">
					<ul>
						<li>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.</li> 
						<li>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.</li> 
					</ul>
				</div> 
				
			</div>

			
			<div class="card">
				<div class="card-header bg-red">New Joinee</div>
				<div class="card-body joinee-section">
					<div id="myCarousel" class="carousel slide" data-ride="carousel">

						  <!-- The slideshow -->
						  <div class="carousel-inner">
							<div class="carousel-item active">
							  	{{ HTML::image('images/1.jpg','name',array("width"=>1100, "height"=>500)) }}
	
							  <div class="carousel-caption">
								<h3>Joinee Name</h3>
								<p>Department Name</p>
							  </div>
							</div>
							<div class="carousel-item">
								{{ HTML::image('images/1.jpg','name',array("width"=>1100, "height"=>500)) }}
							    <div class="carousel-caption">
								<h3>Joinee Name</h3>
								<p>Department Name</p>
							  </div>
							</div>
							<div class="carousel-item">
								{{ HTML::image('images/1.jpg','name',array("width"=>1100, "height"=>500)) }}
	
							  <div class="carousel-caption">
								<h3>Joinee Name</h3>
								<p>Department Name</p>
							  </div>
							</div>
						  </div>
						  
						  <!-- Left and right controls -->
						  <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
							<span class="carousel-control-prev-icon"></span>
						  </a>
						  <a class="carousel-control-next" href="#myCarousel" data-slide="next">
							<span class="carousel-control-next-icon"></span>
						  </a>
						</div>
					</div> 
			</div>
	</div>
  </div>
</div>

@stop