@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">        
            <div class="panel panel-primary">
                <div class="panel-heading">Edit {{$shg->name}}</div>

                <div class="panel-body">
                   <form action="{{url('self-help-groups/'.$shg->id)}}" method="post">
                   {{ method_field('PATCH') }}
						<div class="form-group form-inline">
							<label for="name" class="col-sm-2">SHG Name: </label>
							<input type="text" name="name" placeholder="SHG Name" class="form-control" value="{{$shg->name}}">
						</div>
						
						<div class="form-group form-inline">
							<label for="village" class="col-sm-2">Village: </label>
							
							<select name="village_id" class="form-control">
								
							@foreach($villages as $village)
								<option value="{{$village->id}}" {{($shg->village_id == $village->id) ? 'selected="selected"' : ''}}>{{$village->name}}</option>
							@endforeach
							</select>
						</div>						

						<div class="form-group form-inline">
							<label for="established_on" class="col-sm-2">Established on: </label>
							<input type="date" name="established_on" class="form-control">	
							<p class="help-block"> Enter {{$shg->established_on}}</p>						
						</div>
						
						<div class="form-group form-inline">
							<label for="monthly_deposit" class="col-sm-2">Monthly Deposit: </label>
							<input type="number" name="monthly_deposit" placeholder="Montly Deposit" class="form-control" value="{{$shg->monthly_deposit}}">
							
						</div>
						<div class="form-group form-inline">
							<label for="economic_status" class="col-sm-2">Economic Status: </label>
							<select name="economic_status" class="form-control">
								<option value="High" @if($shg->economic_status == 'High') 
								selected="selected" @endif >High</option>
								<option value="Medium" @if($shg->economic_status == 'Medium') selected="selected" @endif>Medium</option>shg
								<option value="Low" @if($shg->economic_status == 'Low') selected="selected" @endif>Low</option>
							</select>
							
						</div>
						<div class="form-group form-inline">
							<label for="economic_status_detail" class="col-sm-2">Economic Status Detail: </label>
							<textarea name="economic_status_detail" class="form-control" id="economic_status_detail">{{$shg->economic_status_detail}}</textarea>
						</div>
						<hr>
						<div class="form-group form-inline">
							<label for="caste_status" class="col-sm-2">Caste Status: </label>
							
							<select name="caste_status" class="form-control">
								<option value="High" @if($shg->caste_status == 'High') 
								selected="selected" @endif >High</option>
								<option value="Medium" @if($shg->caste_status == 'Medium') selected="selected" @endif>Medium</option>shg
								<option value="Low" @if($shg->caste_status == 'Low') selected="selected" @endif>Low</option>
							</select>
						</div>
						<div class="form-group form-inline">
							<label for="caste_status_detail" class="col-sm-2">Caste Status Detail: </label>
							<textarea name="caste_status_detail" class="form-control" id="caste_status_detail">{{$shg->caste_status_detail}}</textarea>
						</div>
									
						<div class="form-group form-inline">
							<label class="col-sm-2">Samhu Saheli:</label>
							<div class="checkbox">
								<input type="checkbox" name="samhu_saheli_member" value="1" {{($shg->samhu_saheli_member==1) ? 'checked="checked"' : '' }}> is Samhu Saheli member of this group?
							</div>
						</div>

						<div class="form-group form-inline">
							<label for="caste_status" class="col-sm-2">SHG Meeting Day: </label>
							
							<select name="shg_meeting_day" class="form-control">								
								<option value="Monday" {{($shg->shg_meeting_day == "Monday") ? 'selected="selected"' : ''}}>Monday</option>
								<option value="Tuesday" {{($shg->shg_meeting_day == "Tuesday") ? 'selected="selected"' : ''}}>Tuesday</option>
								<option value="Wednesday" {{($shg->shg_meeting_day == "Wednesday") ? 'selected="selected"' : ''}}>Wednesday</option>
								<option value="Thursday" {{($shg->shg_meeting_day == "Thursday") ? 'selected="selected"' : ''}}>Thursday</option>
								<option value="Friday" {{($shg->shg_meeting_day == "Friday") ? 'selected="selected"' : ''}}>Friday</option>
								<option value="Saturday" {{($shg->shg_meeting_day == "Saturday") ? 'selected="selected"' : ''}}>Saturday</option>
								<option value="Sunday" {{($shg->shg_meeting_day == "Sunday") ? 'selected="selected"' : ''}}>Sunday</option>								
							</select>
						</div>

						<div class="form-group form-inline">
							<label for="shg_meeting_time" class="col-sm-2">SHG Meeting time: </label>
							<input type="text" name="shg_meeting_time" placeholder="SHG Meeting time" class="form-control" value="{{$shg->shg_meeting_time}}">
						</div>

						<div class="form-group form-inline">
							<label class="col-sm-2">Bank Account:</label>
							<div class="checkbox">
								<input type="checkbox" name="bank_account" value="1" {{($shg->bank_account==1) ? 'checked="checked"' : '' }}> if SHG has a bank account?
							</div>
						</div>

						<div class="form-group form-inline">
							<label for="savings" class="col-sm-2">SHG Savings: </label>
							<input type="number" name="savings" placeholder="SHG Savings" class="form-control" value="{{$shg->savings}}">
						</div>
						
						<hr>	
						<div class="form-group form-inline">
							<label for="literacy_level" class="col-sm-2">Literacy Level: </label>
							<input type="text" name="literacy_level" placeholder="Literacy Level" class="form-control" value="{{$shg->literacy_level}}">
						</div>

						<div class="form-group form-inline">
							<label for="women_age_avg" class="col-sm-2">Women Average Age: </label>
							<input type="text" name="women_age_avg" placeholder="Avg age of women" class="form-control" value="{{$shg->women_age_avg}}">
						</div>

						<div class="form-group form-inline">
							<label for="family_profession" class="col-sm-2">Family Profession: </label>
							<input type="text" name="family_profession" placeholder="Family Profession" class="form-control" value="{{$shg->family_profession}}">
						</div>

						<div class="form-group form-inline">
							<label for="women_marital_count" class="col-sm-2">Marital Status: </label>
							<input type="text" name="women_marital_count" placeholder="Marital Status" class="form-control" value="{{$shg->women_marital_count}}">
						</div>

						<div class="form-group form-inline">
							<label for="phones_count" class="col-sm-2">Phones Count: </label>
							<input type="text" name="phones_count" placeholder="Phones Count" class="form-control" value="{{$shg->phones_count}}">
						</div>

						
						<!-- Form Control-->
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Update Self Help Group</button>
						</div>
						{{csrf_field()}}
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
