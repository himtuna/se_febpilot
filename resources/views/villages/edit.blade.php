@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">        
            <div class="panel panel-default">
                <div class="panel-heading">Edit {{$village->name}} village</div>

                <div class="panel-body">
                   <form action="{{url('villages/'.$village->id)}}" method="post">
                   {{ method_field('PATCH') }}
						<div class="form-group form-inline">
							<label for="name" class="col-sm-2">Name: </label>
							<input type="text" name="name" placeholder="Village Name" class="form-control" value="{{$village->name}}">
						</div>
						<div class="form-group form-inline">
							<label for="shg_coordinator" class="col-sm-2">SHG Coordinator: </label>
							
							<select name="shg_coordinator_id" class="form-control">
								
							@foreach($shg_coordinators as $shg_coordinator)
								@if($village->shg_coordinator_id == $shg_coordinator->id)
								<option value="{{$shg_coordinator->id}}" selected="selected">{{$shg_coordinator->name}}</option>
								@else
								<option value="{{$shg_coordinator->id}}">{{$shg_coordinator->name}}</option>
								@endif
							@endforeach
							</select>
						</div>

						<div class="form-group form-inline">
							<label for="total_shgs" class="col-sm-2">Total SHGs in village: </label>
							<input type="number" name="total_shgs" placeholder="Total SHGs in Village" class="form-control" value="{{$village->total_shgs}}">							
						</div>
						
						<div class="form-group form-inline">
							<label for="distance" class="col-sm-2">Distance: </label>
							<input type="number" name="distance" placeholder="Distance from PPES" class="form-control" value="{{$village->distance}}">
							
						</div>
						<div class="form-group form-inline">
							<label for="economic_status" class="col-sm-2">Economic Status: </label>
							
							<select name="economic_status" class="form-control">								
								<option value="High" @if($village->economic_status == 'High') 
								selected="selected" @endif >High</option>
								<option value="Medium" @if($village->economic_status == 'Medium') selected="selected" @endif>Medium</option>
								<option value="Low" @if($village->economic_status == 'Low') selected="selected" @endif>Low</option>
							</select>
						</div>
						<div class="form-group form-inline">
							<label for="economic_status_detail" class="col-sm-2">Economic Status Detail: </label>
							<textarea name="economic_status_detail" class="form-control" id="economic_status_detail">{{$village->economic_status_detail}}</textarea>
						</div>
						<div class="form-group form-inline">
							<label for="caste_status" class="col-sm-2">Caste Status: </label>
							
							<select name="caste_status" class="form-control">								
								<option value="High" @if($village->caste_status == 'High') 
								selected="selected" @endif >High</option>
								<option value="Medium" @if($village->caste_status == 'Medium') selected="selected" @endif>Medium</option>
								<option value="Low" @if($village->caste_status == 'Low') selected="selected" @endif>Low</option>
							</select>
						</div>
						<div class="form-group form-inline">
							<label for="caste_status_detail" class="col-sm-2">Caste Status Detail: </label>
							<textarea name="caste_status_detail" class="form-control" id="caste_status_detail">{{$village->caste_status_detail}}</textarea>
						</div>
									
						<div class="form-group form-inline">
							<label class="col-sm-2">DBP Scheme:</label>
							<div class="checkbox">
								<input type="checkbox" name="dbp_scheme" value="1" @if($village->dbp_scheme == 1)checked="checked" @endif> Dairy Best Practices implemented.
							</div>
						</div>

						<div class="form-group form-inline">
							<label class="col-sm-2">Soap Scheme:</label>
							<div class="checkbox">
								<input type="checkbox" name="soap_making_scheme" value="1" @if($village->soap_scheme == 1) checked="checked" @endif> Soap Making Scheme implemented.
							</div>
						</div>

						<div class="form-group form-inline">
							<label class="col-sm-2">PPES Students:</label>
							<div class="checkbox">
								<input type="checkbox" name="ppes_students" value="1" @if($village->ppes_students == 1)checked="checked" @endif> Girls studying at PPES.
							</div>
						</div>

						<div class="form-group form-inline">
							<label for="govt_scheme" class="col-sm-2">Govt Scheme: </label>
							<input type="text" name="govt_scheme" placeholder="Any Govt Scheme in Village" class="form-control" value="{{$village->govt_scheme}}">
						</div>
						
						
						<!-- Form Control-->
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Update Village</button>
						</div>
						{{csrf_field()}}
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
