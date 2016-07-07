@extends('layouts.app')

@section('content')
<script src="//cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">        
            <div class="panel panel-primary">
                <div class="panel-heading">Create a village</div>

                <div class="panel-body">
                   <form action="{{url('villages')}}" method="post">
						<div class="form-group form-inline">
							<label for="name" class="col-sm-2">Name: </label>
							<input type="text" name="name" placeholder="Village Name" class="form-control">
						</div>
						<div class="form-group form-inline">
							<label for="shg_coordinator" class="col-sm-2">SHG Coordinator: </label>
							
							<select name="shg_coordinator_id" class="form-control">
								<option value selected disabled>--SHG Coordinator--</option>
							@foreach($shg_coordinators as $shg_coordinator)
								<option value="{{$shg_coordinator->id}}">{{$shg_coordinator->name}}</option>
							@endforeach
							</select>
						</div>

						<div class="form-group form-inline">
							<label for="total_shgs" class="col-sm-2">Total SHGs in village: </label>
							<input type="number" name="total_shgs" placeholder="Total SHGs in Village" class="form-control">							
						</div>
						
						<div class="form-group form-inline">
							<label for="distance" class="col-sm-2">Distance: </label>
							<input type="number" name="distance" placeholder="Distance from PPES" class="form-control">
							
						</div>
						<div class="form-group form-inline">
							<label for="economic_status" class="col-sm-2">Economic Status: </label>
							
							<select name="economic_stutus" class="form-control">
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
							<label class="col-sm-2">DBP Scheme:</label>
							<div class="checkbox">
								<input type="checkbox" name="dbp_scheme"> Dairy Best Practices implemented.
							</div>
						</div>

						<div class="form-group form-inline">
							<label class="col-sm-2">Soap Scheme:</label>
							<div class="checkbox">
								<input type="checkbox" name="soap_making_scheme"> Soap Making Scheme implemented.
							</div>
						</div>

						<div class="form-group form-inline">
							<label class="col-sm-2">PPES Students:</label>
							<div class="checkbox">
								<input type="checkbox" name="ppes_students"> Girls studying at PPES.
							</div>
						</div>

						<div class="form-group form-inline">
							<label for="govt_scheme" class="col-sm-2">Govt Scheme: </label>
							<input type="text" name="govt_scheme" placeholder="Any Govt Scheme in Village" class="form-control">
						</div>
						
						
						<!-- Form Control-->
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Create Village</button>
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
