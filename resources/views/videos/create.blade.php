@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">        
            <div class="panel panel-default">
                <div class="panel-heading">Create a video</div>

                <div class="panel-body">
                   <form action="{{url('videos')}}" method="post">


						<div class="form-group form-inline">
							<label for="village" class="col-sm-2">Week: </label>
							
							<select name="video_stack_id" class="form-control" required="required">
								<option value selected disabled>--Week--</option>
							@foreach($videostacks as $videostack)
								<option value="{{$videostack->id}}">{{$videostack->short_title}} ({{$videostack->name}})</option>
							@endforeach
							</select>
						</div>

						<div class="form-group form-inline">
							<label for="name" class="col-sm-2">Video Name: </label>
							<input type="text" name="name" placeholder="Video Name" class="form-control" required="required" size="60">
						</div>

						<div class="form-group form-inline">
							<label for="short_title" class="col-sm-2">Short Title: </label>
							<input type="text" name="short_title" placeholder="Short Title" class="form-control" size="20">
						</div>

						<div class="form-group form-inline">
							<label for="youtube_link" class="col-sm-2">YouTube Link: </label>
							<input type="text" name="youtube_link" placeholder="YouTube Link" class="form-control">
						</div>

						<div class="form-group form-inline">
							<label for="liked" class="col-sm-2">Liked: </label>
							
							<select name="liked" class="form-control" required="required">
								<option value selected disabled>----</option>
								<option value="Extremely Disliked">Extremely Disliked</option>
								<option value="Disliked">Disliked</option>
								<option value="Misunderstood">Misunderstood</option>
								<option value="Not Watched">Not Watched</option>
								<option value="Watched">Watched</option>
								<option value="Liked">Liked</option>
								<option value="Extremely Liked">Extremely Liked</option>						
							</select>
						</div>

						<div class="form-group form-inline">
							<label for="short_title">General Feedback: </label>
							<textarea name="feedback" id="feedback" class="ckeditor"></textarea>
						</div>

						<div class="form-group form-inline">
							<label for="success_story">Success Story: </label>
							<textarea name="success_story" id="success_story" class="ckeditor"></textarea>
						</div>
						

                   		<!-- Form Control-->
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Create Video</button>
						</div>
						{{csrf_field()}}
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
