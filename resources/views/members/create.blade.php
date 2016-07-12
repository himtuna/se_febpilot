@extends('layouts.app')

@section('content')
<script src="//cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">        
            <div class="panel panel-primary">
                <div class="panel-heading">Add new Member to the group</div>

                <div class="panel-body">
                   <form action="{{url('members')}}" method="post" enctype="multipart/form-data">

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
								<input type="text" name="name" placeholder="Woman Name" class="form-control">
						</div>
						
						<div class="form-group form-inline">
							<label for="village" class="col-sm-2">Village: </label>
							
							<select name="village_id" class="form-control" required="required">
								<option value selected disabled>--Village--</option>
							@foreach($villages as $village)
								<option value="{{$village->id}}">{{$village->name}}</option>
							@endforeach
							</select>
						</div>
						<div class="form-group form-inline">
							<label for="photo" class="col-sm-2">Upload image: </label>
							<div class="form-control">
								<input type="file" name="photo">
							</div>							
						</div>	
						<div class="form-group form-inline">
							<label for="age" class="col-sm-2">Age: </label>
							<input type="number" name="age" placeholder="Age of woman" class="form-control">
						</div>
						<div class="form-group form-inline">
							<label class="col-sm-2">Religion:</label>
							<select name="religion" class="form-control">
								<option value selected disabled>--Religion--</option>
								<option value="Hindu">Hindu</option>
								<option value="Muslim">Muslim</option>
								<option value="Sikh">Sikh</option>
								<option value="Christian">Christian</option>
								<option value="Other">Other</option>
							</select>							
						</div>
						<div class="form-group">
							<div class="form-group">
				    		<label for="profile">Profile and Background</label>
				    			<textarea name="profile" id="feedback" class="ckeditor"></textarea>
				    			<p class="help-block">Profile and Backgroun of SHG Member</p>
				     		</div>
						</div>
				      
				    </div>

				    <div id="menu2" class="tab-pane fade">
				     	<div class="form-group form-inline">
								<label for="economic_status" class="col-sm-2">Economic Status: </label>
								
								<select name="economic_status" class="form-control">
									<option value selected disabled>--Economic Status--</option>
									<option value="High">High</option>
									<option value="Medium">Medium</option>
									<option value="Low">Low</option>
								</select>
						</div>
						<div class="form-group form-inline">
							<label for="economic_status_detail" class="col-sm-2">Economic Status Detail: </label>
							<textarea name="economic_status_detail" class="form-control" id="economic_status_detail"></textarea>
						</div>
						<hr>
						<div class="form-group form-inline">
							<label for="caste_status" class="col-sm-2">Caste Status: </label>
							
							<select name="caste_status" class="form-control">
								<option value selected disabled>--Caste Status--</option>
								<option value="High">High</option>
								<option value="Medium">Medium</option>
								<option value="Low">Low</option>
							</select>
						</div>
						<div class="form-group form-inline">
							<label for="caste_status_detail" class="col-sm-2">Caste Status Detail: </label>
							<textarea name="caste_status_detail" class="form-control" id="caste_status_detail"></textarea>
						</div>
									
						<hr>
						<div class="form-group form-inline">
							<label class="col-sm-2">Samhu Saheli:</label>
							<div class="checkbox">
								<input type="checkbox" name="samhu_saheli" value="1"> is she Samhu Saheli?
							</div>
						</div>

						<div class="form-group form-inline">
							<label class="col-sm-2">SHG Role:</label>
							<select name="shg_role" class="form-control">
								<option value selected disabled>--Role in SHG--</option>
								<option value="Member">Member</option>
								<option value="President">President</option>
								<option value="Vice-President">Vice-President</option>
								<option value="Treasurer">Treasurer</option>
							</select>							
						</div>	
						
						<div class="form-group form-inline">
							<label class="col-sm-2">Bank Account:</label>
							<div class="checkbox">
								<input type="checkbox" name="bank_account" value="1"> if she has a bank account?
							</div>
						</div>
				    </div>
				    
				    <div id="menu3" class="tab-pane fade">

						<div class="form-group form-inline">
							<label for="house_type" class="col-sm-2">House Type: </label>
							<input type="text" name="house_type" placeholder="House Type" class="form-control">
						</div>
						<div class="form-group form-inline">
						<label for="education" class="col-sm-2">Education: </label>

							<select name="education" class="form-control">
								<option value selected disabled>--Education--</option>
								@foreach($education_types as $education_type)
								<option value="{{$education_type}}">{{$education_type}}</option>
								@endforeach								
							</select>
						</div>

						<div class="form-group form-inline">
							<label class="col-sm-2">Can she write:</label>
							<div class="checkbox">
								<input type="checkbox" name="can_write" value="1"> can she write?
							</div>
						</div>

						<div class="form-group form-inline">
							<label for="travel_outside" class="col-sm-2">Travelled Outside: </label>
							<textarea name="travel_outside" class="form-control"></textarea>
							<div class="help-block">Has she travelled outside Anupshahr?</div>
						</div>

						<div class="form-group form-inline">
							<label for="children" class="col-sm-2">Children: </label>
							<input type="number" name="children" placeholder="No. of Children" class="form-control">							
						</div>
						<div class="form-group form-inline">
							<label for="family_members" class="col-sm-2">Family Members: </label>
							<textarea name="family_members" placeholder="About family members" class="form-control"></textarea>
						</div>
						<div class="form-group form-inline">
							<label for="shg_value" class="col-sm-2">SHG Value for her: </label>
							<textarea name="shg_value" placeholder="SHG Value for her" class="form-control"></textarea>
						</div>

				
				    </div>
				    <div id="menu4" class="tab-pane fade">
				    	<div class="form-group">
				    		<label for="feedback">Feedback</label>
				    			<textarea name="feedback" id="feedback" class="ckeditor"></textarea>
				     	</div>
				     	<hr>
				     	<div class="form-group">
				    		<label for="success_story">Success Story</label>
				    			<textarea name="success_story" id="success_story" class="ckeditor"></textarea>
				     	</div>	
				     	<div class="form-group">
				    		<label for="feedback_videos_detail">Feedback on Videos</label>
				    			<textarea name="feedback_videos_detail" id="feedback_videos_detail" class="ckeditor"></textarea>
				    			<p class="help-block">Enter general feedback on videos woman watched</p>
				     	</div>
				     	<div class="form-group">
				    		<label for="feedback_tech_detail">Feedback on Technology</label>
				    			<textarea name="feedback_tech_detail"  id="feedback_tech_detail" class="ckeditor"></textarea>
				    			<p class="help-block">Enter general feedback on Technology, smartphones, etc.</p>
				     	</div>
				     	<hr>
				     	<div class="form-group">
				    		<label for="before_detail">Before</label>
				    			<textarea name="before_detail"  id="before_detail" class="ckeditor"></textarea>
				    			<p class="help-block">About woman before we started our project</p>
				     	</div>
				     	<div class="form-group">
				    		<label for="after_detail">After</label>
				    			<textarea name="after_detail"  id="after_detail" class="ckeditor"></textarea>
				    			<p class="help-block">Changes in woman's attitude, behaviour, impact of our programme.</p>
				     	</div>

				     <hr>
				     <div class="form-group form-inline">
				     	<label for="feedback_recordings">Feedback recordings: </label>
				     		<input type="text" name="feedback_recordings" class="form-control">
				     		<p class="help-block">Please enter the dropbox video url separated by comma.</p>
				     	
				     </div>			
				    </div>


			    </div>	

						

						
						
						
						<!-- Form Control-->
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Create Member</button>
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
    CKEDITOR.replace('.ckeditor');    
</script>
@endsection
