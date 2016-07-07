@extends('layouts.app')

@section('content')
<script src="//cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">        
            <div class="panel panel-default">
                <div class="panel-heading">Edit feedback for {{$shg_coordinator->name}}</div>

                <div class="panel-body">               
                

                           
                                <div class="col-sm-2">
                                <div class="thumbnail">
                                <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                                <strong>{{$shg_coordinator->name}}</strong>
                                </div><!-- /thumbnail -->
                                </div><!-- /col-sm-1 -->

                                <div class="col-sm-10">
                                <div class="panel panel-default panel-comment">
                                <div class="panel-heading comment">
                                <strong>{{$shg_coordinator->name}}</strong>
                                </div>
                                <div class="panel-body">
                                <form action="{{url('shg_coordinators/'.$shg_coordinator->id)}}" method="post">
                                {{ method_field('PATCH') }}
                                <div class="form-group">
                                <textarea type="text" name="feedback" id="feedback-{{$shg_coordinator->id}}" class="form-control" >{{$shg_coordinator->feedback}}</textarea>
                                </div>
                                <div class="form-group form-inline">
                                	<label for="phone">Phone:</label>
                                	<input type="text" value="{{$shg_coordinator->phone}}" name="phone" class="form-control">
				

                                </div>
		                        <div class="form-group">
									<button type="submit" class="btn btn-primary">Update Feedback </button>
								</div>
							{{csrf_field()}}
                                </form>
                                
                                <hr>
                                SHG Coordinator for Village(s):
                                </div><!-- /panel-body -->
                                <div class="panel-footer">Phone: {{$shg_coordinator->phone}}                                 
                                </div>
                                </div><!-- /panel panel-default -->
                                </div><!-- /col-sm-5 -->                           
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'feedback-{{$shg_coordinator->id}}');
</script>

@endsection
