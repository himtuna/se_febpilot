@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">        
            <div class="panel panel-default">
                <div class="panel-heading">{{$member->name}} from {{$member->village->name}}</div>               

                <div class="panel-body"> 
                	<ul class="nav nav-tabs">
				    <li class="active"><a data-toggle="tab" href="#menu1">Basic Details</a></li>
				    <li><a data-toggle="tab" href="#menu2">Socio-Economic Background</a></li>
				    <li><a data-toggle="tab" href="#menu3">Survey</a></li>
				    <li><a data-toggle="tab" href="#menu4">Feedback</a></li>
				    <li><a  class="btn-default" href="{{url('members/'.$member->id.'/edit')}}">Edit</a></li>
				  </ul>
				  <br>

					<div class="tab-content">
					    <div id="menu1" class="tab-pane fade in active">
					    	
						    <strong>Name: </strong>{{$member->name}} <br>
						    <strong>Village: </strong>{{$member->village->name}} <br>
						    <strong>Profile: </strong> {!! $member->profile !!}

							
							
					    </div>

					    <div id="menu2" class="tab-pane fade">
					    	Economic Status: <span class="label {{($member->economic_status == 'High') ? 'label-success' : ''}} {{($member->economic_status == 'Medium') ? 'label-info' : ''}} {{($member->economic_status == 'Low') ? 'label-warning' : ''}}">{{$member->economic_status}}</span><br>
					    	Details{{$member->economic_status_details}}
					    	<hr>

					    	Caste Status: <span class="label {{($member->caste_status == 'High') ? 'label-success' : ''}} {{($member->caste_status == 'Medium') ? 'label-info' : ''}} {{($member->caste_status == 'Low') ? 'label-warning' : ''}}">{{$member->caste_status}}</span> <br>
					    	Details: {{$member->caste_status_detail}}
					     </div>
					    
					    <div id="menu3" class="tab-pane fade">

		
					
					    </div>
					    <div id="menu4" class="tab-pane fade">
					    	
					    		<label for="feedback">Feedback:</label>
					    			{!!$member->feedback!!}
					     	
					     		<hr>
					     	
					    		<label for="success_story">Success Story: </label>
					    			{!!$member->success_story!!}
					     				
				    	</div>

			    	</div><!-- tab Content -->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection