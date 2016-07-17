@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">        
            <div class="panel panel-default">
                <div class="panel-heading">Edit Feedback on {{$feedback->video->short_title}} ({{$feedback->video->video_stack->short_title}}) by {{$feedback->member->name}} from {{$feedback->member->village->name}}</div>

                <div class="panel-body">

                <form action="{{url('feedbacks/'.$feedback->id)}}" method="post">
                    {{ method_field('PATCH') }}


                    <div class="form-group form-inline">
                        <label for="video_id" class="col-sm-2">Video: </label>
                        
                        <select name="video_id" id="video_id" class="form-control select2" required="required">
                            
                        @foreach($videos as $video)
                            <option value="{{$video->id}}" {{($feedback->video_id == $video->id) ? 'selected=selected' : ''}}>{{$video->short_title}} ({{$video->name}} - {{$video->video_stack->short_title}})</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group form-inline">
                        <label for="member_id" class="col-sm-2">Woman: </label>
                        
                        <select name="member_id" id="member_id" class="form-control select2" required="required">
                            
                        @foreach($members as $member)
                            <option value="{{$member->id}}" {{($feedback->member_id == $member->id) ? 'selected=selected' : ''}}>{{$member->name}} ({{$member->village->name}})</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group form-inline">
                        <label for="video_liked" class="col-sm-2">Video Liked: </label>
                        
                        <select name="video_liked" class="form-control select2" required="required">
                            @if($feedback->video_liked == NULL) <option value selected disabled>--</option> @endif
                            <option value="Extremely Disliked" {{($feedback->video_liked == "Extremely Disliked" ? 'selected="selected"' : '')}}>Extremely Disliked</option>
                            <option value="Disliked" {{($feedback->video_liked == "Disliked" ? 'selected="selected"' : '')}}>Disliked</option>
                            <option value="Misunderstood" {{($feedback->video_liked == "Misunderstood" ? 'selected="selected"' : '')}}>Misunderstood</option>
                            <option value="Not Watched" {{($feedback->video_liked == "Not Watched" ? 'selected="selected"' : '')}}>Not Watched</option>
                            <option value="Watched" {{($feedback->video_liked == "Watched" ? 'selected="selected"' : '')}}>Watched</option>
                            <option value="Liked" {{($feedback->video_liked == "Liked" ? 'selected="selected"' : '')}}>Liked</option>
                            <option value="Extremely Liked" {{($feedback->video_liked == "Extremely Liked" ? 'selected="selected"' : '')}}>Extremely Liked</option>                      
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="detail">Feedback</label>
                        <textarea name="detail" id="detail" class="ckeditor">{{$feedback->detail}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="quote">Quote from woman</label>
                        <textarea name="quote" id="quote" class="ckeditor">{{$feedback->quote}}</textarea>
                    </div>

                     <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update Feedback </button>
                    </div>
                    {{csrf_field()}}
                </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
