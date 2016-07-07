@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">        
            <div class="panel panel-default">
                <div class="panel-heading">Create a village</div>

                <div class="panel-body">

                <form action="{{url('shg-coordinators)}}" method="post">
                                

                                 <div class="form-group">
									<button type="submit" class="btn btn-primary">Create SHG Coordinator</button>
								</div>
							{{csrf_field()}}
                                </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
