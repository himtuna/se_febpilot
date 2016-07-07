@extends('layouts.app')

@section('content')
<script src="//cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">        
            <div class="panel panel-primary">
                <div class="panel-heading">Create a Self Help Group</div>

                <div class="panel-body">
                   <form action="{{url('self-help-groups')}}" method="post">
						<div class="form-group form-inline">
							<label for="name" class="col-sm-2">SHG Name: </label>
							<input type="text" name="name" placeholder="SHG Name" class="form-control">
						</div>
						
						<div class="form-group form-inline">
							<label for="village" class="col-sm-2">Village: </label>
							
							<select name="village_id" class="form-control">
								<option value selected disabled>--Village--</option>
							@foreach($villages as $village)
								<option value="{{$village->id}}">{{$village->name}}</option>
							@endforeach
							</select>
						</div>						

						<div class="form-group form-inline">
							<label for="established_on" class="col-sm-2">Established on: </label>
							<input type="date" name="established_on" class="form-control">							
						</div>
						
						<div class="form-group form-inline">
							<label for="monthly_deposit" class="col-sm-2">Monthly Deposit: </label>
							<input type="number" name="monthly_deposit" placeholder="Montly Deposit" class="form-control">
							
						</div>
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
									
						<div class="form-group form-inline">
							<label class="col-sm-2">Samhu Saheli:</label>
							<div class="checkbox">
								<input type="checkbox" name="samhu_saheli_member" value="1"> is Samhu Saheli member of this group?
							</div>
						</div>

						<div class="form-group form-inline">
							<label for="caste_status" class="col-sm-2">SHG Meeting Day: </label>
							
							<select name="shg_meeting_day" class="form-control">
								<option value selected disabled>--SHG Meeting Day--</option>
								<option value="Monday">Monday</option>
								<option value="Tuesday">Tuesday</option>
								<option value="Wednesday">Wednesday</option>
								<option value="Thursday">Thursday</option>
								<option value="Friday">Friday</option>
								<option value="Saturday">Saturday</option>
								<option value="Sunday">Sunday</option>								
							</select>
						</div>

						<div class="form-group form-inline">
							<label for="shg_meeting_time" class="col-sm-2">SHG Meeting time: </label>
							<input type="text" name="shg_meeting_time" placeholder="SHG Meeting time" class="form-control">
						</div>

						<div class="form-group form-inline">
							<label class="col-sm-2">Bank Account:</label>
							<div class="checkbox">
								<input type="checkbox" name="bank_account" value="1"> if SHG has a bank account?
							</div>
						</div>

						<div class="form-group form-inline">
							<label for="savings" class="col-sm-2">SHG Savings: </label>
							<input type="number" name="savings" placeholder="SHG Savings" class="form-control">
						</div>
						
						<hr>	
						<div class="form-group form-inline">
							<label for="literacy_level" class="col-sm-2">Literacy Level: </label>
							<input type="text" name="literacy_level" placeholder="Literacy Level" class="form-control">
						</div>

						<div class="form-group form-inline">
							<label for="women_age_avg" class="col-sm-2">Women Average Age: </label>
							<input type="text" name="women_age_avg" placeholder="Avg age of women" class="form-control">
						</div>

						<div class="form-group form-inline">
							<label for="family_profession" class="col-sm-2">Family Profession: </label>
							<input type="text" name="family_profession" placeholder="Family Profession" class="form-control">
						</div>

						<div class="form-group form-inline">
							<label for="women_marital_count" class="col-sm-2">Marital Status: </label>
							<input type="text" name="women_marital_count" placeholder="Marital Status" class="form-control">
						</div>

						<div class="form-group form-inline">
							<label for="phones_count" class="col-sm-2">Phones Count: </label>
							<input type="text" name="phones_count" placeholder="Phones Count" class="form-control">
						</div>

						
						
						
						<!-- Form Control-->
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Create Self Help Group</button>
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
    CKEDITOR.replace( 'for="economic_status_detail"');
</script>
@endsection
