<nav class="navbar navbar-inverse navbar-expand-md navbar-dark">
  <div class="container-fluid">
    <div class="navbar-header">
      <!--<a class="navbar-brand" href="#">{{ HTML::image('images/mycachet_logo.jpg', 'MYCACHET',array("height"=>28,"width"=>134)) }}</a>-->
         <!-- <a class="navbar-brand" href="#"><label class="headertxt">MYCACHET</label></a> -->
      
    </div>
   
    <!--<ul class="nav navbar-nav " style="padding-right:2%;">-->
     <ul class="nav navbar-nav ">        
    
     <li class="nav-item">
         	@if($userdata->photo != "")	
        	@if(is_readable(storage_path("../../app/uploads/".$userdata->photo))) 
                {{ HTML::image("uploads/".$userdata->photo,'user pic',array("class"=>'mr-3 rounded-circle userpic',"height"=>50,"width"=>50)) }}
            @else
               {{ HTML::image('images/user/default-user.png','user pic',array("class"=>'mr-3 rounded-circle userpic',"height"=>50,"width"=>50)) }}
            @endif
            @else
                {{ HTML::image('images/user/default-user.png','user pic',array("class"=>'mr-3 rounded-circle userpic',"height"=>50,"width"=>50)) }}
          
            @endif
      </li>
      <li class="nav-item" >
        <a class="nav-link" href="#"><h4 class="alignImage">WELCOME {{$userdata->name}}</h4></a>
      </li>
      
      <li class="nav-item">
            <a class="nav-link" href="{{route('logout')}}"><h4 class="alignImage">LOGOUT</h4></a>
      </li>
    
    </ul>
  </div>
</nav>

<div class="header-section">
{{ HTML::image('images/header-img.jpg', 'header image',array('class' => 'header-img')) }}
</div>
