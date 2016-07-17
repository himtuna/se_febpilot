@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">        
            <div class="panel panel-primary">
                <div class="panel-heading">Create a video</div>

                <div class="panel-body">
                   <form action="{{url('videos/'.$video->id)}}" method="post">
                   {{ method_field('PATCH') }}

						<div class="form-group form-inline">
							<label for="name" class="col-sm-2">Video Name: </label>
							<input type="text" name="name"  placeholder="Video Name" class="form-control" required="required" value="{{$video->name}}">
						</div>

						<div class="form-group form-inline">
							<label for="short_title" class="col-sm-2">Short Title: </label>
							<input type="text" name="short_title" placeholder="Short Title" class="form-control" value="{{$video->short_title}}">
						</div>

						<div class="form-group form-inline">
							<label for="youtube_link" class="col-sm-2">YouTube Link: </label>
							<input type="text" name="youtube_link" placeholder="YouTube Link" class="form-control" value="{{$video->youtube_link}}">
						</div>

						<div class="form-group form-inline">
							<label for="village" class="col-sm-2">Week: </label>
							
							<select name="video_stack_id" class="form-control" required="required">
							 @foreach($videostacks as $videostack)
								<option value="{{$videostack->id}}" {{($video->video_stack_id == $videostack->id) ? 'selected="selected"' : ''}}>{{$videostack->short_title}} ({{$videostack->name}})</option>
							@endforeach
							</select>
						</div>

						<div class="form-group form-inline">
							<label for="liked" class="col-sm-2">Liked: </label>
							
							<select name="liked" class="form-control" required="required">
								<option value="Extremely Disliked" {{($video->liked == "Extremely Disliked" ? 'selected="selected"' : '')}}>Extremely Disliked</option>
								<option value="Disliked" {{($video->liked == "Disliked" ? 'selected="selected"' : '')}}>Disliked</option>
								<option value="Misunderstood" {{($video->liked == "Misunderstood" ? 'selected="selected"' : '')}}>Misunderstood</option>
								<option value="Not Watched" {{($video->liked == "Not Watched" ? 'selected="selected"' : '')}}>Not Watched</option>
								<option value="Watched" {{($video->liked == "Watched" ? 'selected="selected"' : '')}}>Watched</option>
								<option value="Liked" {{($video->liked == "Liked" ? 'selected="selected"' : '')}}>Liked</option>
								<option value="Extremely Liked" {{($video->liked == "Extremely Liked" ? 'selected="selected"' : '')}}>Extremely Liked</option>						
							</select>
						</div>

						<div class="form-group form-inline">
							<label for="short_title">General Feedback: </label>
							<textarea name="feedback" id="feedback" class="ckeditor">{{$video->feedback}}</textarea>
						</div>

						<div class="form-group form-inline">
							<label for="success_story">Success Story: </label>
							<textarea name="success_story" id="success_story" class="ckeditor">{{$video->success_story}}</textarea>
						</div>
						

                   		<!-- Form Control-->
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Update Video</button>
						</div>
						{{csrf_field()}}
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
