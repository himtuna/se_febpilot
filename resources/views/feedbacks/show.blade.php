@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">        
            <div class="panel panel-default">
                <div class="panel-heading">Feedback on {{$feedback->video->short_title}} ({{$feedback->video->video_stack->short_title}}) by {{$feedback->member->name}} from {{$feedback->member->village->name}}</div>

                <div class="panel-body">
                    <div class="row">
                       <div class="col-sm-2 pull-right">
                            <div class="thumbnail">
                            <img class="img-responsive user-photo" @if(isset($feedback->member->image)) src="{{url($feedback->member->image)}}" @else src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png" @endif>
                            <strong>{{$feedback->member->name}}</strong>
                            </div><!-- /thumbnail -->
                        </div><!-- /col-sm-1 -->
                        <div class="col-sm-10">
                            <div class="panel panel-default panel-comment">
                                <div class="panel-body">
                                 <div class="col-sm-4 pull-right">
                                    <?php 
                                    if($feedback->video->youtube_link !=''){
                                        $video_id = explode("?v=", $feedback->video->youtube_link);
                                        $video_id = $video_id[1];
                                    }
                                    else $video_id = '';
                                    ?>
                                    @if($video_id != '')
                                    <iframe width="100%" src="https://www.youtube.com/embed/{{$video_id}}" frameborder="0" allowfullscreen></iframe>@endif
                                    <br><strong>{{$feedback->video->name}}</strong><br>
                                    </div><!-- /thumbnail -->
                                    <div>
                                    <h4><strong>{{$feedback->member->name}}</strong> <em>{{$feedback->video_liked}} this video</em> <br></h4>
                                    <strong>{{$feedback->video->video_stack->short_title}}:</strong> {{$feedback->video->video_stack->name}} <br>
                                    <strong>Video:</strong> {{$feedback->video->short_title}} ({{$feedback->video->name}})<hr>
                                    <strong>Feedback:</strong>{!!$feedback->detail!!}
                                    <strong>Quote:</strong>{!!$feedback->quote!!}
                                </div>
                                    
                                </div>
                            </div>
                        </div>

                    </div>

                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
