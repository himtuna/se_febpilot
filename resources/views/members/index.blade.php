@extends('layouts.app')
@section('head')
<link href="http://vjs.zencdn.net/5.10.4/video-js.css" rel="stylesheet">

<!-- If you'd like to support IE8 -->
<script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">        
            <div class="panel panel-default">
                <div class="panel-heading">Feedback from Women</div>

                <div class="panel-body">               
                

                <ul class="nav nav-tabs">
                    <?php $i=0; ?>
                    @foreach($villages as $village)                    
                        <li {{($i==0) ? 'class=active': ''}}><a data-toggle="tab" href="#menu{{$village->id}}">{{$village->name}} <span class="badge"> {{count($village->members)}}</span></a></li>
                        <?php $i++;?>
                    @endforeach
                    <li><a href="{{url('members/create')}}" class="btn-success">+ Woman</a></li>
                  </ul>
                  <br>
                        
                        <div class="tab-content">
                            <?php $i=0; ?>
                            @foreach($villages as $village)
                            
                            <div id="menu{{$village->id}}" class="tab-pane fade {{($i==0) ? 'in active': ''}}">
                                
                                @foreach($village->members as $member)
                                
                                <div class="row">
                                <div class="col-sm-2">
                                <div class="thumbnail">
                                <img class="img-responsive user-photo" @if(File::isFile($member->image)) src="{{url($member->image)}}" @else src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png" @endif>
                                <strong>
                                    <a href="{{url('members/'.$member->id)}}">{{$member->name}}</a>
    
                                </strong> <br>
                                <small>
                                    Age: {{($member->age )}} <br>
                                    SHG: {{$member->shg_role}} <br>
                                    Education: {{$member->education}} <br>
                                    Can she write: {{($member->can_write == 1) ? 'Yes' : 'No'}}
                                </small>
                                </div><!-- /thumbnail -->
                                </div><!-- /col-sm-1 -->

                                <div class="col-sm-10">
                                <div class="panel {{($member->samhu_saheli == 1) ? 'panel-info' : 'panel-default'}} panel-comment">
                                <div class="panel-heading comment">
                                <strong>{{$member->name}} {{($member->samhu_saheli == 1) ? '(Samhu Saheli)' : ''}}</strong>
                                </div>
                                <div class="panel-body">
                                @if($member->profile !="")
                                    <div class="bs-callout">
                                    <h4 class="feedback-heading">Profile</h4>
                                    {!!$member->profile!!}
                                    </div>
                                @endif
                                @if($member->feedback == NULL)
                                <div class="alert alert-info"><p><strong>No Record Found!</strong> Feedback not available!</p></div>
                                @else 
                                <!-- <h4 class="feedback-heading">Feedback</h4> -->
                                <div class="bs-callout bs-callout-feedback">
                                <h4>Feedback</h4>
                                {!!$member->feedback!!}    
                                </div>
                                
                                @endif
                                
                                @if(count($member->feedbacks) || $member->feedback_videos_detail !=NULL)
                                <div class="bs-callout bs-callout-danger">
                                <h4>Feedback on Videos</h4>
                                {!! $member->feedback_videos_detail !!}
                                <ul>
                                @foreach($member->feedbacks as $feedback)
                                <li><a href="{{url('feedbacks/'.$feedback->id)}}"> {{$feedback->video->short_title}} : {{$feedback->video->name}} ({{$feedback->video->video_stack->short_title}})</a> - {!!$feedback->detail !!}</li>
                                @endforeach
                                </ul>
                                </div>
                                @endif 
                                
                                @if($member->feedback_tech_detail !="")
                                <div class="bs-callout bs-callout-tech">
                                <h4>Tech Feedback</h4>
                                {!! $member->feedback_tech_detail !!}
                                </div>
                                @endif

                                @if($member->success_story!="")
                                <div class="bs-callout bs-callout-success">
                                <h4>Impact Story</h4>
                                {!! $member->success_story !!}
                                </div>
                                @endif

                                @if($member->after_detail != NULL || $member->before_detail != NULL)    
                                <div class="row" style="margin-left:8px; margin-right:8px">

                                    <div class="bs-callout col-sm-6 feedback-before">
                                    <h4>Before</h4>
                                    {!! $member->before_detail !!}
                                    <br>
                                    <ul>
                                        <li>She could use a feature phone without assistance? 
                                        @if($member->feature_phone_assistance  == 1 )
                                        <span class="label label-success">Yes</span>
                                        @else <span class="label label-warning">No</span>
                                        @endif
                                        </li>
                                        <li>She could use feature phone other than for calling? 
                                        @if($member->feature_phone_usage_noncalling  == 1 )
                                        <span class="label label-success">Yes</span>
                                        @else <span class="label label-warning">No</span>
                                        @endif
                                        </li>
                                        <li>
                                        She had her own feature phone?
                                        @if($member->feature_phone_own  == 1 )
                                        <span class="label label-success">Yes</span>
                                        @else <span class="label label-warning">No</span>
                                        @endif
                                        </li>
                                        <li>She had a smartphone at home? 
                                        @if($member->smartphone_home  == 1 )
                                        <span class="label label-success">Yes</span>
                                        @else <span class="label label-warning">No</span>
                                        @endif
                                        </li>
                                        
                                    </ul>
                                    </div>
                                    <div class="clear-fix"></div>
                                    <div class="bs-callout col-sm-6 feedback-after">
                                    <h4>After</h4>
                                    {!! $member->after_detail !!}
                                    </div>
                                    
                                </div>
                                @endif

                                @if($member->feedback_recordings)    
                                <div class="bs-callout bs-callout-feedback">
                                    <h4>Feedback Recordings</h4>
                                    @foreach (explode(', ', $member->feedback_recordings) as $feedback_recording)
                                          <video id="my-video" class="video-js" controls preload="none" width="640" height="264" data-setup="{}">
                                        <source src="{{ $feedback_recording }}" type='video/mp4'>                                     
                                        <p class="vjs-no-js">
                                          To view this video please enable JavaScript, and consider upgrading to a web browser that
                                          <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                        </p>
                                      </video>
                                      <br>                                      
                                    @endforeach
                                </div>
                                @endif
                                
                                </div><!-- /panel-body -->
                                <div class="panel-footer">Village: <a href="{{url('villages/#'.$member->village->id)}}">{{$member->village->name}}</a>
                                <a href="{{url('members/'.$member->id.'/edit')}}" class="pull-right"><i class="fa fa-pencil"></i> Edit Feedback</a>
                                </div>
                                </div><!-- /panel panel-default -->
                                </div><!-- /col-sm-5 -->
                                </div> 
                                
                                @endforeach
                            </div>
                        
                            <?php $i++; ?>
                            @endforeach
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script src="http://vjs.zencdn.net/5.10.4/video.js"></script>
@endsection
