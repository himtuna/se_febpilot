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
							
							<select name="village_id" class="form-control">
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
				      
				    </div>

				    <div id="menu2" class="tab-pane fade">
				     	<div class="form-group form-inline">
							<label for="economic_status" class="col-sm-2">Economic Status: </label>
							
							<select name="economic_status" class="form-control">
								<option value disabled selected></option>
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
							<label class="col-sm-2">Bank Account:</label>
							<div class="checkbox">
								<input type="checkbox" name="bank_account" value="1" {{($member->bank_account==1) ? 'checked="checked"' : '' }}> if Woman has a bank account?
							</div>
						</div>
				    </div>
				    
				    <div id="menu3" class="tab-pane fade">

	
				
				    </div>
				    <div id="menu4" class="tab-pane fade">
				    	<div class="form-group">
				    		<label for="feedback">Feedback</label>
				    			<textarea name="feedback" id="feedback">{{$member->feedback}}</textarea>
				     	</div>
				     	<hr>
				     	<div class="form-group">
				    		<label for="success_story">Success Story</label>
				    			<textarea name="success_story" id="success_story">{{$member->success_story}}</textarea>
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
    CKEDITOR.replace( 'feedback');
    CKEDITOR.replace( 'success_story');
</script>
@endsection
