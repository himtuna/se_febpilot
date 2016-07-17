@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">        
            <div class="panel panel-default">
                <div class="panel-heading">Create a feedback by a woman on a video</div>

                <div class="panel-body">
                <form action="{{url('feedbacks')}}" method="post">


					<div class="form-group form-inline">
						<label for="video_stack_id" class="col-sm-2">Week: </label>
						
						<select name="video_stack_id" id="video_stack_id" class="form-control select2" required="required">
							<option value selected disabled>--Week--</option>
						@foreach($videostacks as $videostack)
							<option value="{{$videostack->id}}">{{$videostack->short_title}}: {{$videostack->name}}</option>
						@endforeach
						</select>
					</div>

					<div class="form-group form-inline">
						<label for="video_id" class="col-sm-2">Video: </label>
						
						<select name="video_id" id="video_id" class="form-control" required="required">
							<option value="  "></option>
						
						</select>

					</div>

					<div class="form-group form-inline">
						<label for="member_id" class="col-sm-2">Woman: </label>
						
						<select name="member_id" id="member_id" class="form-control select2" required="required">
							<option value selected disabled>--Woman--</option>
						@foreach($members as $member)
							<option value="{{$member->id}}">{{$member->name}} ({{$member->village->name}})</option>
						@endforeach
						</select>
					</div>
					<hr>
					<div class="form-group form-inline">
							<label for="video_liked" class="col-sm-2">Liked: </label>
							
							<select name="video_liked" class="form-control" required="required">
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

					<div class="form-group">
						<label for="detail">Feedback</label>
						<textarea name="detail" id="detail" class="ckeditor"></textarea>
					</div>

					<div class="form-group">
						<label for="quote">Quote from woman</label>
						<textarea name="quote" id="quote" class="ckeditor"></textarea>
					</div>


					<div class="form-group">
						<button type="submit" class="btn btn-primary">Create Feedback</button>
					</div>
					{{csrf_field()}}
                </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>


<script>
	$.ajaxSetup({
	  headers: {
	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});

	$('#video_stack_id').on('change',function(e) {
		console.log(e);

		var video_stack_id = e.target.value;

		//ajax
		$.get('{{url('feedbacks/create/ajax-videos?video_stack_id=')}}' + video_stack_id, function(data) {
			$('#video_id').empty();
			$.each(data, function(index, videoObj) { 
				$('#video_id').append('<option value="'+videoObj.id+'" size="30">'+videoObj.short_title+': '+videoObj.name+'</option>');
			});
		});
	});
</script>
@endsection
