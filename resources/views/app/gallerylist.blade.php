@extends('app.layout.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-11"></div>
        <div class="col-lg-1">
        <a class="nav-link" href="http://mycachet.com/index.php/userdesk"><b><-Back</b></a>
        </div>
    </div>
	<div class="row">
		<!-- <div class="row"> --> 
			
		@foreach($gallarydata as $key=>$data)
			<div class="col-lg-3 event-album" event-id="{{'event_'.$key}}"> 
			
			@foreach($data['pics'] as $picsdata)
				  {{ HTML::image('uploads/events/'.$picsdata->pic, 'name',array('width'=>300,'height'=>300,'class'=>'img-thumbnail ')) }}
				  @break
			@endforeach
			<label style="text-align: right !important;">{{$data['event_name']}}</label>
			</div>
			


			<div id="{{'event_'.$key}}" class="modal fade" role="dialog">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      	<div class="modal-header">
			        	<button type="button" class="close" data-dismiss="modal">&times;</button>
			      	</div>
			      	<div class="modal-body">
			      		<div id="{{'eventcuro_'.$key}}" class="carousel slide" data-ride="carousel">
						  	<div class="carousel-inner"> 
						  		<?php $actflg="active";?>
						    	@foreach($data['pics'] as $picsdata)
									<div class="carousel-item <?php echo $actflg;?>">
								      		  {{ HTML::image('uploads/events/'.$picsdata->pic, 'name',array('height'=>550,'width'=>500,'class'=>'d-block w-100')) }}
								   </div>
								   <?php $actflg="";?>
					    		@endforeach
							
						  	</div>
						  <a class="carousel-control-prev" href="#{{'eventcuro_'.$key}}" role="button" data-slide="prev">
						    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
						    <span class="sr-only">Previous</span>
						  </a>
						  <a class="carousel-control-next" href="#{{'eventcuro_'.$key}}" role="button" data-slide="next">
						    <span class="carousel-control-next-icon" aria-hidden="true"></span>
						    <span class="sr-only">Next</span>
						  </a>
						</div>

			    	</div>
			  	</div>
			  </div>
			 </div>
			
			@endforeach

		<!-- </div> -->
	</div>
</div>


@stop

