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
					    	<div class="thumbnail col-sm-2" style="margin-right:10px">
                                <img class="img-responsive user-photo" @if(File::isFile($member->image)) src="{{url($member->image)}}" @else src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png" @endif>                                
                            </div><!-- /thumbnail -->
					    	
						    <strong>Name: </strong>{{$member->name}} <br>
						    <strong>Village: </strong>{{$member->village->name}} <br>
						    <strong>Profile: </strong> {!! $member->profile !!}
					    </div>

					    <div id="menu2" class="tab-pane fade">
					    	<strong>Profession: </strong> {!! $member->profession !!} <br>
					    	<strong>Bank Account: </strong> {{($member->bank_account == 1) ? 'Yes' : 'No'}}
					    	<hr>

					    	Economic Status: <span class="label {{($member->economic_status == 'High') ? 'label-success' : ''}} {{($member->economic_status == 'Medium') ? 'label-info' : ''}} {{($member->economic_status == 'Low') ? 'label-warning' : ''}}">{{$member->economic_status}}</span><br>
					    	Details{{$member->economic_status_details}}
					    	<hr>

					    	Caste Status: <span class="label {{($member->caste_status == 'High') ? 'label-success' : ''}} {{($member->caste_status == 'Medium') ? 'label-info' : ''}} {{($member->caste_status == 'Low') ? 'label-warning' : ''}}">{{$member->caste_status}}</span> <br>
					    	Details: {{$member->caste_status_detail}} 
					    	<hr>
					    	
					    	<strong>Samhu Saheli: </strong> {{($member->samhu_saheli == 1) ? 'Yes' : 'No'}} <br>
					    	<strong>SHG Role: </strong> {{ $member->shg_role }} <br>
					    	<strong>SHG value for her: </strong> {!! $member->shg_value !!} <br>
					    	
					     </div>
					    
					    <div id="menu3" class="tab-pane fade">
					    	<h4>Personal Details</h4>
							<strong>Age: </strong>{{$member->age}} <br>
						    <strong>Religion: </strong>{{$member->religion}} <br>
							<strong>Education: </strong> {{$member->education}} <br>
							<strong>Can write: </strong> {{($member->can_write == 1) ? 'Yes' : 'No'}} <br>
							<strong>Travelled Outside: </strong> {{$member->travel_outside}} <br>
							<strong>Marital Status: </strong> {{$member->marital_status}} <br>
							<strong>Children: </strong> {{$member->children}} <br>
							<hr>
							<h4>Family Details</h4>
							<strong>House Type: </strong> {{$member->house_type}} <br>
							<strong>TV at home: </strong> {{($member->television == 1) ? 'Yes' : 'No'}} <br>
							<strong>Family Members: </strong> {{$member->family_members}} <br>
							<strong>Family Profession: </strong> {{$member->family_profession}} <br>
							<hr>
							<h4>Technology</h4>
							<strong>Feature at home: </strong> {{($member->feature_phone_home == 1) ? 'Yes' : 'No'}} <br>
							<strong>Feature phone usage: </strong> {{$member->feature_phone_usage}} <br>
							<strong>Feature phone for non-calling: </strong> {{($member->feature_phone_usage_noncalling == 1) ? 'Yes' : 'No'}} <br>
							<strong>Feature phone usage without assistance: </strong> {{($member->feature_phone_assistance == 1) ? 'Yes' : 'No'}} <br>
							<strong>Own Feature phone: </strong> {{($member->feature_phone_own == 1) ? 'Yes' : 'No'}} <br>
							<strong>Smartphone at home: </strong> {{($member->smartphone_home == 1) ? 'Yes' : 'No'}} <br>

							<strong>Smartphone usage: </strong> {{$member->smartphone_home_usage}} <br>


					
					    </div>
					    <div id="menu4" class="tab-pane fade">
					    	
					    		<label for="feedback">Feedback:</label>
					    			{!!$member->feedback!!}
					     		<hr>
					    		<label for="success_story">Success Story: </label>
					    			{!!$member->success_story!!}
				    			<hr>
					     		<label for="feedback_videos_detail">Feedback on videos: </label>
					     			{!! $member->feedback_videos_detail !!}
					     		<hr>		
				     			<label for="feedback_tech_detail">Feedback on Technology: </label>
					     			{!! $member->feedback_tech_detail !!}
				     			<div class="row" style="margin-left:8px; margin-right:8px">

                                    <div class="bs-callout col-sm-6 feedback-before">
                                    <h4>Before</h4>
                                    {!! $member->before_detail !!}
                                    </div>
                                    <div class="clear-fix"></div>
                                    <div class="bs-callout col-sm-6 feedback-after">
                                    <h4>After</h4>
                                    {!! $member->after_detail !!}
                                    </div>
                                    
                                </div>
				    	</div>

			    	</div><!-- tab Content -->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection