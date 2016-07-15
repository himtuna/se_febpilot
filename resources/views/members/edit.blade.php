@extends('layouts.app')

@section('content')
<script src="//cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">        
            <div class="panel panel-primary">
                <div class="panel-heading">Edit {{$member->name}}</div>

                <div class="panel-body">
                   <form action="{{url('members/'.$member->id)}}" method="post" enctype="multipart/form-data">
                   {{ method_field('PATCH') }}

                   <ul class="nav nav-tabs">
				    <li class="active"><a data-toggle="tab" href="#menu1">Basic Details</a></li>
				    <li><a data-toggle="tab" href="#menu2">Socio-Economic Background</a></li>
				    <li><a data-toggle="tab" href="#menu3">Survey</a></li>
				    <li><a data-toggle="tab" href="#menu4">Feedback</a></li>
				  </ul>
				  <br>

				  <div class="tab-content">
				    <div id="menu1" class="tab-pane fade in active">
				    	
					    <div class="form-group form-inline">
								<label for="name" class="col-sm-2">Woman Name: </label>
								<input type="text" name="name" placeholder="SHG Name" class="form-control" value="{{$member->name}}">
						</div>
						
						<div class="form-group form-inline">
							<label for="village" class="col-sm-2">Village: </label>
							
							<select name="village_id" class="form-control" required="required">
								@foreach($villages as $village)
								<option value="{{$village->id}}" {{($member->village_id == $village->id) ? 'selected="selected"' : ''}}>{{$village->name}}</option>
							@endforeach
							</select>
						</div>

						<div class="form-group form-inline">
							<label for="photo" class="col-sm-2">Upload image: </label>
							<div class="form-control">
								<input type="file" name="photo">
							</div>							
						</div>
						<hr>
						<div class="form-group">
				    		<label for="profile">Profile and Background</label>
				    			<textarea name="profile" id="feedback" class="ckeditor">{{$member->profile}}</textarea>
				    			<p class="help-block">Profile and Backgroun of SHG Member</p>
			     		</div>							
					</div>
				    

				    <div id="menu2" class="tab-pane fade">
				    	

			     		<div class="form-group form-inline">
							<label for="profession" class="col-sm-2">Her Profession: </label>
							<textarea name="profession" placeholder="About her professions" class="form-control">{{$member->profession}}</textarea>
						</div>

						<div class="form-group form-inline">
							<label class="col-sm-2">Bank Account:</label>
							<div class="checkbox">
								<input type="checkbox" name="bank_account" value="1" {{($member->bank_account==1) ? 'checked="checked"' : '' }}> if Woman has a bank account?
							</div>
						</div>
						<hr>
				     	<div class="form-group form-inline">
								<label for="economic_status" class="col-sm-2">Economic Status: </label>
								
								<select name="economic_status" class="form-control">
									@if($member->economic_status == NULL)
									<option value selected disabled>--Economic Status--</option>				
									@endif
									<option value="High" @if($member->economic_status == 'High') 
									selected="selected" @endif >High</option>
									<option value="Medium" @if($member->economic_status == 'Medium') selected="selected" @endif>Medium</option>
									<option value="Low" @if($member->economic_status == 'Low') selected="selected" @endif>Low</option>
								</select>
						</div>
						<div class="form-group form-inline">
							<label for="economic_status_detail" class="col-sm-2">Economic Status Detail: </label>
							<textarea name="economic_status_detail" class="form-control" id="economic_status_detail">{{$member->economic_status_detail}}</textarea>
						</div>
						<hr>
						<div class="form-group form-inline">
							<label for="caste_status" class="col-sm-2">Caste Status: </label>
							
							<select name="caste_status" class="form-control">
									@if($member->caste_status == NULL)
									<option value selected disabled>--Caste Status--</option>				
									@endif
								<option value="High" @if($member->caste_status == 'High') 
								selected="selected" @endif >High</option>
								<option value="Medium" @if($member->caste_status == 'Medium') selected="selected" @endif>Medium</option>shg
								<option value="Low" @if($member->caste_status == 'Low') selected="selected" @endif>Low</option>
							</select>
						</div>
						<div class="form-group form-inline">
							<label for="caste_status_detail" class="col-sm-2">Caste Status Detail: </label>
							<textarea name="caste_status_detail" class="form-control" id="caste_status_detail">{{$member->caste_status_detail}}</textarea>
						</div>
									
						<div class="form-group form-inline">
							<label class="col-sm-2">Samhu Saheli:</label>
							<div class="checkbox">
								<input type="checkbox" name="samhu_saheli" value="1" {{($member->samhu_saheli==1) ? 'checked="checked"' : '' }}> is she Samhu Saheli?
							</div>
						</div>
						<div class="form-group form-inline">
							<label class="col-sm-2">SHG Role:</label>
							<select name="shg_role" class="form-control">
							@if($member->shg_role == NULL)
								<option value selected disabled>--Role in SHG--</option>
							@endif
								<option value="Member" {{($member->shg_role == 'Member') ? 'selected=selected': ''}}>Member</option>
								<option value="President" {{($member->shg_role == 'President') ? 'selected=selected': ''}}>President</option>
								<option value="Vice-President" {{($member->shg_role == 'Vice-President') ? 'selected=selected': ''}}>Vice-President</option>
								<option value="Treasurer" {{($member->shg_role == 'Treasurer') ? 'selected=selected': ''}}>Treasurer</option>
							
							</select>							
						</div>
						<div class="form-group form-inline">
							<label for="shg_value" class="col-sm-2">SHG Value for her: </label>
							<textarea name="shg_value" placeholder="SHG Value for her" class="form-control">{{$member->shg_value}}</textarea>
						</div>
				    </div>
				    
				    <div id="menu3" class="tab-pane fade">

				    	<h4>Personal Details</h4>
				    	<div class="form-group form-inline">
							<label for="age" class="col-sm-2">Age: </label>							
								<input type="number" name="age" value="{{$member->age}}" class="form-control">	
						</div>
						<div class="form-group form-inline">
							<label class="col-sm-2">Religion:</label>
							<select name="religion" class="form-control">
							@if($member->religion == NULL)
								<option value selected disabled>--Religion--</option>
							@endif
								<option value="Hindu"{{($member->religion == "Hindu" ? 'selected=selected' : '')}}>Hindu</option>
								<option value="Muslim" {{($member->religion == "Muslim" ? 'selected=selected' : '')}}>Muslim</option>
								<option value="Sikh" {{($member->religion == "Sikh" ? 'selected=selected' : '')}}>Sikh</option>
								<option value="Christian" {{($member->religion == "Christian" ? 'selected=selected' : '')}}>Christian</option>
								<option value="Other" {{($member->religion == "Other" ? 'selected=selected' : '')}}>Other</option>
							</select>							
						</div>
						<div class="form-group form-inline">
						<label for="education" class="col-sm-2">Education: </label>

							<select name="education" class="form-control">
								@if($member->education == NULL)
								<option value selected disabled>--Education--</option>
								@endif
								@foreach($education_types as $education_type)
								<option value="{{$education_type}}" {{($member->education ==  $education_type) ? 'selected=selected' : ''}}>{{$education_type}}</option>
								@endforeach								
							</select>
						</div>

						<div class="form-group form-inline">
							<label class="col-sm-2">Can she write:</label>
							<div class="checkbox">
								<input type="checkbox" name="can_write" value="1" {{($member->can_write==1) ? 'checked="checked"' : '' }}> can she write?
							</div>
						</div>

						<div class="form-group form-inline">
							<label for="travel_outside" class="col-sm-2">Travelled Outside: </label>
							<textarea name="travel_outside" class="form-control">{{$member->travel_outside}}</textarea>
							<div class="help-block">Has she travelled outside Anupshahr?</div>
						</div>

						<div class="form-group form-inline">
						<label for="marital_status" class="col-sm-2">Marital Status: </label>

							<select name="marital_status" class="form-control">
								@if($member->marital_status == NULL)
								<option value selected disabled>--marital_status--</option>
								@endif
								@foreach($marital_types as $marital_type)
								<option value="{{$marital_type}}" {{($member->marital_status ==  $marital_type) ? 'selected=selected' : ''}}>{{$marital_type}}</option>
								@endforeach								
							</select>
						</div>
						
						<div class="form-group form-inline">
							<label for="children" class="col-sm-2">Children: </label>
							<input type="number" name="children" placeholder="No. of Children" value="{{$member->children}}" class="form-control">							
						</div>



						<h4>Family Details</h4>
						<div class="form-group form-inline">
							<label for="family_profile" class="col-sm-2">Family Profile: </label>
							<textarea name="family_profile" placeholder="Family Profile" class="form-control">{{$member->family_profile}}</textarea>
						</div>
						<div class="form-group form-inline">
							<label for="family_education" class="col-sm-2">Family Education Level: </label>
							<textarea name="family_education" placeholder="About family education level" class="form-control">{{$member->family_education}}</textarea>
						</div>
						<div class="form-group form-inline">
							<label for="family_members" class="col-sm-2">Family Members: </label>
							<textarea name="family_members" placeholder="About family members" class="form-control">{{$member->family_members}}</textarea>
						</div>
						<div class="form-group form-inline">
							<label for="family_profession" class="col-sm-2">Family Profession: </label>
							<textarea name="family_profession" placeholder="About family professions" class="form-control">{!! $member->family_profession !!}</textarea>
						</div>
						<div class="form-group form-inline">
							<label for="house_type" class="col-sm-2">House Type: </label>
							<input type="text" name="house_type" value="{{$member->house_type}}" class="form-control">
						</div>
						<div class="form-group form-inline">
							<label class="col-sm-2">Television at Home:</label>
							<div class="checkbox">
								<input type="checkbox" name="television" value="1" {{($member->television ==1) ? 'checked="checked"' : '' }}> if she has a Television at home
							</div>
						</div>
						<div class="form-group form-inline">
							<label for="tv_programs" class="col-sm-2">TV Programs: </label>
							<textarea name="tv_programs" class="form-control" id="tv_programs">{!! $member->tv_programs!!}</textarea>
						</div>
						
						<h4>Technology</h4>
						<div class="form-group form-inline">
							<label class="col-sm-3">Feature phone:</label>
							<div class="checkbox">
								<input type="checkbox" name="feature_phone" value="1" {{($member->feature_phone ==1) ? 'checked="checked"' : '' }}> if she has a feature phone at home?
							</div>
						</div>
						<div class="form-group form-inline">
							<label for="feature_phone_usage" class="col-sm-3">Feature phone usage: </label>
							<textarea name="feature_phone_usage" placeholder="Feature phone usage" class="form-control">{!! $member->feature_phone_usage !!}</textarea>
						</div>
						<div class="form-group form-inline">
							<label class="col-sm-3">Feature phone Non-calling:</label>
							<div class="checkbox">
								<input type="checkbox" name="feature_phone_usage_noncalling" value="1" {{($member->feature_phone_usage_noncalling == 1) ? 'checked="checked"' : '' }}> if she uses Feature phone other than for calling?
							</div>
						</div> 
						<div class="form-group form-inline">
							<label class="col-sm-3">Feature phone Assistance:</label>
							<div class="checkbox">
								<input type="checkbox" name="feature_phone_assistance" value="1" {{($member->feature_phone_assistance==1) ? 'checked="checked"' : '' }}> Can she use Feature phone without assistance?
							</div>
						</div>
						<div class="form-group form-inline">
							<label class="col-sm-3">Feature Own:</label>
							<div class="checkbox">
								<input type="checkbox" name="feature_phone_own" value="1" {{($member->feature_phone_own == 1) ? 'checked="checked"' : '' }}> if she has her own Feature phone
							</div>
						</div>
						<br>
						<div class="form-group form-inline">
							<label class="col-sm-3">Smartphone at Home:</label>
							<div class="checkbox">
								<input type="checkbox" name="smartphone_home" value="1" {{($member->smartphone_home == 1) ? 'checked="checked"' : '' }}> if she has a Smartphone at home
							</div>
						</div>
						<div class="form-group form-inline">
							<label for="smartphone_home_usage" class="col-sm-3">Smartphone usage: </label>
							<textarea name="smartphone_home_usage" placeholder="Smartphone usage" class="form-control">{!! $member->smartphone_home_usage !!}</textarea>
						</div>


	
				
				    </div>
				    <div id="menu4" class="tab-pane fade">
				    	<div class="form-group">
				    		<label for="feedback">Feedback</label>
				    			<textarea name="feedback" id="feedback" class="ckeditor">{{$member->feedback}}</textarea>
				     	</div>
				     	<hr>
				     	<div class="form-group">
				    		<label for="success_story">Success Story</label>
				    			<textarea name="success_story" id="success_story" class="ckeditor">{{$member->success_story}}</textarea>
				     	</div>
				     	<div class="form-group">
				    		<label for="feedback_videos_detail">Feedback on Videos</label>
				    			<textarea name="feedback_videos_detail"  id="feedback_videos_detail" class="ckeditor">{{$member->feedback_videos_detail}}</textarea>
				    			<p class="help-block">Enter general feedback on videos woman watched</p>
				     	</div>
				     	<div class="form-group">
				    		<label for="feedback_tech_detail">Feedback on Technology</label>
				    			<textarea name="feedback_tech_detail"  id="feedback_tech_detail" class="ckeditor">{{$member->feedback_tech_detail}}</textarea>
				    			<p class="help-block">Enter general feedback on Technology, smartphones, etc.</p>
				     	</div>
				     	<hr>
				     	<div class="form-group">
				    		<label for="before_detail">Before</label>
				    			<textarea name="before_detail"  id="before_detail" class="ckeditor">{{$member->before_detail}}</textarea>
				    			<p class="help-block">About woman before we started our project</p>
				     	</div>
				     	<div class="form-group">
				    		<label for="after_detail">After</label>
				    			<textarea name="after_detail"  id="after_detail" class="ckeditor">{{$member->after_detail}}</textarea>
				    			<p class="help-block">Changes in woman's attitude, behaviour, impact of our programme.</p>
				     	</div>	
				     	<hr>
				     	 <div class="form-group form-inline">
				     		<label for="feedback_recordings">Feedback Recordings</label>
				     		<input type="text" name="feedback_recordings" value="{{$member->feedback_recordings}}" class="form-control">
				     		<p class="help-block">Please enter the dropbox video url separated by comma.</p>
				     	</div>				
				    </div>

			    </div>	

						

						
						
						
						<!-- Form Control-->
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Update Member</button>
						</div>
						{{csrf_field()}}
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( '.ckeditor');
    
</script>
@endsection
