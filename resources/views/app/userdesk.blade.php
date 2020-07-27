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
							  <a href="javascript:void('0');"><i class="fab fa-studiovinari fa-lg"></i> My Apps <span class="arrow"></span></a>
							</li>
							<ul class="sub-menu collapse" id="products">
								<li class="active"><a target="_blank" href="{{Config::get('constants.links.mail')}}">Email</a></li>
								<li class="active"><a target="_blank" href="{{Config::get('constants.links.attendance')}}">Attendance</a></li>
								<li class="active"><a target="_blank" href="{{Config::get('constants.links.doctor')}}">Hi Doctor</a></li>
							</ul>

							<li data-toggle="collapse" data-target="#service" class="collapsed">
							  <a href="javascript:void('0');"><i class="fab fa-fort-awesome-alt fa-lg"></i> Payroll <span class="arrow"></span></a>
							</li>  
							<ul class="sub-menu collapse" id="service">
								
								<?php
									if(count($salaryslips)>0){
										foreach ($salaryslips as $key => $value) {
										    $value1=explode('+',$value)[0];
										    $year=explode('+',$value)[1];
										    $key=explode('+',$value)[2];
										   
								?>
								<li class="active"><a href="http://mycachet.com/index.php/downloadSalary?id=<?php echo  $value1;?>" class="sal-slip">Payslip <?php echo  $key ." ".$year ?> </a></li>
								<?php
										}
									}else{
								?>
								<li class="active"><a href="javascript:void('0');" class="sal-slip">No Salary Slip Found</a></li>
								<?php
									}
								?>
								
								<!--<li class="active"><a href="javascript:void('0');"  class="form-16"target="downloadFrame">Form 16</a></li>-->
								
								<?php
									if(count($form16)>0){
										foreach ($form16 as $key => $value) {
											if(isset($value['parta'])){
								?>
								<li class="active"><a href="http://mycachet.com/index.php/downloadSalary?id=<?php echo  $value['parta'];?>" class="sal-slip">Download Form 16 Part A</a></li>
								<?php
										}
										if(isset($value['partb'])){
								?>
								<li class="active"><a href="http://mycachet.com/index.php/downloadSalary?id=<?php echo  $value['partb'];?>" class="sal-slip">Download Form 16 Part B</a></li>
								<?php
										}
									}
								
									}else{
								?>

								<li class="active"><a href="javascript:void('0');" class="sal-slip">No Form 16 Found</a></li>

								<?php
									}
								?>
								
								<li data-toggle="collapse" data-target="#invest-dec" class="collapsed">
								    <a href="javascript:void(0);"  class="invest-dec">Investment Declaration</a></li>
								<!--<ul class="sub-menu collapse" id="it">-->
    							  <li class="active"><a target="_blank" href="/uploads/investment/12 BB FORM_FY_2019-20.pdf">12 BB FORM_FY_2019-20</a></li>
    							  <li class="active"><a target="_blank" href="/uploads/investment/LTA FORM FY_2019-20.pdf">LTA FORM FY_2019-20</a></li>
    							<!--</ul>-->
							</ul>


							<li data-toggle="collapse" data-target="#hr" class="collapsed">
							  <a href="javascript:void('0');"><i class="fab fa-pagelines fa-lg"></i> HR Policy<span class="arrow"></span></a>
							</li>
							<ul class="sub-menu collapse" id="hr">
							    <li class="active"><a target="_blank" href="/uploads/HR_Policy/Policy_Handbook_Modified_13.01.2020.pdf"> HR Policies and Procedures Manual and Employee Handbook</a></li>
							    <!--<li class="active"><a target="_blank" href="/uploads/HR_Policy/Policy_Handbook_Intranet.pdf">Policy Handbook Intranet</a></li>-->
							    <!--<li class="active"><a target="_blank" href="/uploads/HR_Policy/Mediclaim_Card.pdf">Instructions to generate Online Mediclaim Card</a></li>-->
							    
							</ul>

							<li data-toggle="collapse" data-target="#it" class="collapsed">
							  <a href="javascript:void('0');"><i class="far fa-file-pdf"></i> IT Policy<span class="arrow"></span></a>
							</li>
							<ul class="sub-menu collapse" id="it">
							  <!--<li class="active"><a target="_blank" href="/uploads/IT_Policy/general%20IT%20policy.pdf">IT Policy (PDF)</a></li>-->
							  <li class="active"><a target="_blank" href="/uploads/HR_Policy/email_policy.pdf">Email Policy (PDF)</a></li>
							  <li class="active"><a target="_blank" href="/uploads/HR_Policy/Procedure%20to%20Reset%20System%20Password.pdf">Procedure to Reset System Password (PDF)</a></li>
							  <li class="active"><a target="_blank" href="/uploads/HR_Policy/General%20Security%20Policy.pdf">General Security Policy (PDF)</a></li>
							</ul>

							
							<li data-toggle="collapse" data-target="#learn" class="collapsed">
							  <a href="javascript:void(0);"><i class="fas fa-user-tie fa-lg"></i>Learning and Development<span class="arrow"></span></a>
							</li>
							<ul class="sub-menu collapse" id="learn">
							  <li class="active"><a target="_blank" href="/uploads/learn/LD.pdf">Learning and Development-1</a></li>
							  <li class="active"><a target="_blank" href="/uploads/learn/LD2.pdf">Learning & Development–2</a></li>
							<li class="active"><a target="_blank" href="/uploads/learn/LD_3.pdf">What Every Successful Sales Professional Needs to Know</a></li>
							</ul>
						</ul>
					</div>
				</div>
			</div>			    
		</div>
		
		
		<div class="card">
			<div class="card-header bg-red">MY Mediclaim</div>
			<div class="card-body">
			    <?php if(isset($mediclaimdata) && !empty($mediclaimdata)){?>
			    <div class="Mediclaim-info">
			        <h6>TPA Health India TPA Ltd.<br>
                        The New India Assurance Company Ltd.</h6>
					<h6>Policy No : <?php echo $mediclaimdata['polid']; ?></h6><br>
					<h6>Policy ID : <?php echo $mediclaimdata['medid']; ?></h6><br>
					<h6>Name of the Insured</h6>
					<?php
						foreach ($mediclaimdata['name_of_insured_person'] as  $key => $value) {
         		      		echo "<p style='font-size: 15px;font-weight: 400;'>".($key+1).". ".$value."</p>";
  						} ?>	
				</div>
			    <?php } ?>
				<div class="Mediclaim-info">
					<h5>Customer Care No</h5>
					<p>Ms. Shivani Jain <br>+91 9867 667 739</p>
				</div>
                <br>
				<div class="Mediclaim-info">
					<p>Download from Play Store as HealthIndia Insurance TPA</p>
				</div>
			</div> 
		</div>
		
		
		<div class="card">
			<div class="card-header bg-red">Photo Gallery</div>
			<div class="card-body galley-section">
				<div class="bxslider">
				@foreach($gallarydata as $data)
				  <div> {{ HTML::image('uploads/events/'.$data->pic, 'name',array('class'=>'event-gal-image','width'=>300,'height'=>335,'event-val'=>$data->event_id)) }}
						</div>
						@endforeach
				</div>
			</div>			    
		</div>
	</div>
	<div class="col-md-6">
		
			<div class="card">
				<div class="card-header bg-blue">Welcome to Cachet Employee Portal </div>
				<div style="font-size: 15.5px;padding: 10px;text-align: justify;" class="card-body welcome-section">
					<?php echo $achievedata[0]->content; ?>
				</div> 
				
			</div>
				
			<div class="card">
				<div class="card-header bg-blue">Achivements</div>
				<div class="card-body achivements-section">
				    
					  <div class="achievementslider">
				        <div>{{ HTML::image('images/certificate_1.jpg','Achivements') }}
						</div>
						<div>{{ HTML::image('images/certificate_2.jpg','Achivements') }}
						</div>
						<div>{{ HTML::image('images/certificate_3.jpg','Achivements') }}
						</div>
							<div>{{ HTML::image('images/certificate_4.jpg','Achivements') }}
						</div>
						<div>{{ HTML::image('images/certificate_5.jpg','Achivements') }}
						</div>
						<div>{{ HTML::image('images/certificate_6.jpeg','Achivements') }}
                                                </div>
				    </div>
						
				</div> 
				
			</div>
				
			<div class="card">
				<div class="card-header bg-blue">Thought For A Day</div>
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
				<div class="card-header bg-red">Employee Directory
					<input type="text" class="form-control" id="emp-dir" placeholder="Name or Mail id or Mob or Designation or Departement...">
            	</div>
				<div class="card-body list-section emp-div">
					<ul id="emp-directory">
					    <Div class="ser-def-div"><h6>Search Employee Details...</h6></div>
					</ul>
				</div> 
				
			</div>
		
			<div class="card">
				<div class="card-header bg-red">News & Events</div>
				<div class="card-body list-section">
					<ul class="newsslider">
						<?php
						foreach ($newsdata as  $key => $value) {
         		      		echo '<li type="square"><a href="'.$value['link'].'" target="_blank">'.$value['title'].'</a></li>';
  					
  						} ?>
					</ul>
				</div> 
				
			</div>
				
			<div class="card" style="max-height: 185px !important;">
				<div class="card-header bg-red">Birthday Wishes</div>
				<div class="card-body birthday-section">
				    <div class="birthslider">
				     <?php if(!empty($birthWishesData)){ ?>
				        	@foreach ($birthWishesData as $data)
						<div class="media border p-3">
						     	     @if($data->photo != "")	
        					
						@if(file_exists("uploads/".$data->photo)) 
						   	{{ HTML::image('uploads/'.$data->photo,'user pic',array("class"=>'mr-3 rounded-circle')) }}
	
						@else
						   	{{ HTML::image('uploads/user/default-user.png','user pic',array("class"=>'mr-3 rounded-circle')) }}
						
						@endif
								@else
        						    {{ HTML::image('uploads/user/default-user.png','user pic',array("class"=>'mr-3 rounded-circle')) }}
        				
        						@endif
        					
							<div class="media-body">
							  <h4>{{$data->name}}</h4>
							  <p>{{$data->department}}</p> 
							  <p>{{$data->location}}</p> 
							</div>
						</div>
					@endforeach
				
				     
				   <?php  }else{?>
				         <p><h3 style="text-align: center;font-size: 18px;padding-top: 22%;">Upcoming birthday not available</h3></p>
					
				     <?php } ?>
				   
				  	</div>
					
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
					         <?php if(!empty($newjoineedata)){ ?>
        				        	@foreach ($newjoineedata as $data)
        				       	<div class="media border p-3">
        				       	     @if($data->photo != "")	
        					
        						@if(file_exists("uploads/".$data->photo)) 
        						   	{{ HTML::image('uploads/'.$data->photo,'user pic',array("class"=>'mr-3 rounded-circle',"title"=>"<h5>$data->name</h5><p>$data->department</p>")) }}
        	
        						@else
        						   	{{ HTML::image('uploads/user/default-user.png','user pic',array("class"=>'mr-3 rounded-circle',"title"=>"<h5>$data->name</h5><p>$data->department</p><p>$data->location</p>")) }}
        						
        						@endif
        								@else
        						    {{ HTML::image('uploads/user/default-user.png','user pic',array("class"=>'mr-3 rounded-circle',"title"=>"<h5>$data->name</h5><p>$data->department</p><p>$data->location</p>")) }}
        				
        						@endif
        					
        						</div>
        					
        					@endforeach
        				
        				     
        				   <?php  }else{?>
        				         <p><h3 style="text-align: center;font-size: 18px;padding-top: 22%;">New joinee not available</h3></p>
        					
        				     <?php } ?>
					        
					    	</div>
						
				</div> 
			</div>
	</div>
  </div>
</div>

@stop

<iframe src="" name="downloadFrame" height="200px" width="500px" style="display: none"></iframe>
<script type="text/javascript">
	var baseurl = '<?php echo url('/'); ?>';
</script>
