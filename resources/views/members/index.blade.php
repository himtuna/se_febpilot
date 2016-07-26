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
                                    Age: {{($member->age )}} years<br>
                                    SHG: {{$member->shg_role}} <br>
                                    Education: {{$member->education}} <br>
                                    Marital Status: {{$member->marital_status}} <br>
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
                                    <a href="#member-details-{{$member->id}}-" data-toggle="collapse"><strong>More Details<i class="fa fa-arrow-down"></i> </strong></a> 
                                    <div id="member-details-{{$member->id}}-" class="collapse">
                                    <hr>
                                    <strong>Personal Information</strong>
                                    <ul>
                                    <li><strong>Name: </strong>{{$member->name}}</li>
                                    <li><strong>Age: </strong>{{$member->age}}</li>
                                    <li><strong>Education: </strong> {{$member->education}}</li>
                                    <li><strong>Marital Status: </strong>{{$member->marital_status}}</li>
                                    <li><strong>Children: </strong> {{$member->children}}</li>
                                    <li><strong>Profession/Econonmic Status: </strong> {!! $member->profession !!}</li>
                                    <li><strong>Personal Bank Account: </strong> {{($member->bank_account == 1) ? 'Yes' : 'No'}}</li>
                                    <li><strong>SHG value for her: </strong> {!! $member->shg_value !!}</li>
                                    <li><strong>Has she travelled outside Anupshahr: </strong> {{$member->travel_outside}}</li>

                                    
                                    </ul>
                                    <strong>Family Background</strong>
                                        <ul>
                                        <li><strong>Family Profile: </strong> {{$member->family_profile}}</li>
                                        <li><strong>Family Members: </strong> {{$member->family_members}}
                                        </li>
                                        <li><strong>Family Education Level: </strong> {{$member->family_education}}</li>
                                        <li><strong>Family Profession: </strong> {{$member->family_profession}} <br></li>
                                            <li><strong>Economic Status:</strong> <span class="label {{($member->economic_status == 'High') ? 'label-success' : ''}} {{($member->economic_status == 'Medium') ? 'label-info' : ''}} {{($member->economic_status == 'Low') ? 'label-warning' : ''}}">{{$member->economic_status}}</span><br>
                                            {{$member->economic_status_details}}
                                            </li>
                                        
                                        
                                        
                                        <li><strong>House Type: </strong> {{$member->house_type}}</li>
                                        <li><strong>TV at home: </strong> {{($member->television == 1) ? 'Yes' : 'No'}}</li>
                                        <li><strong>TV Programs she like: </strong> {{($member->tv_programs)}}</li>
                                        </ul>
                                    <strong>Technology Orientation</strong>
                                    <br><small>Note: Survey done before our Pilot</small>
                                    <ul>
                                        <li><strong>She has feature phone at home: </strong> {{($member->feature_phone == 1) ? 'Yes' : 'No'}}</li>
                                        <li><strong>Does she use the feature phone: </strong> {{$member->feature_phone_usage}}</li>
                                        <li><strong>Does she use it for non-calling purpose: </strong> {{($member->feature_phone_usage_noncalling == 1) ? 'Yes' : 'No'}}</li>
                                        <li><strong> Can she use it without assistance: </strong> {{($member->feature_phone_assistance == 1) ? 'Yes' : 'No'}}</li>
                                        <li><strong>She has her own feature phone: </strong> {{($member->feature_phone_own == 1) ? 'Yes' : 'No'}}</li>
                                        <li><strong>She has Smartphone at home: </strong> {{($member->smartphone_home == 1) ? 'Yes' : 'No'}} </li>
                                        <li><strong>Does she use smartphone on her own: </strong> {{$member->smartphone_home_usage}}</li>
                                    </ul>
                                    <strong>Village Background</strong>
                                        <ul>
                                        <li><strong>Profile: </strong>{{$village->profile}}</li>
                                        <li><strong>Education Level in village: </strong>{{$village->education}}</li>
                                            <li><strong>Economic Status:</strong> <span class="label {{($village->economic_status == 'High') ? 'label-success' : ''}} {{($village->economic_status == 'Medium') ? 'label-info' : ''}} {{($village->economic_status == 'Low') ? 'label-warning' : ''}}">{{$village->economic_status}}</span><br>
                                            {{$village->economic_status_details}}
                                            </li>
                                        <li><strong>Caste Status: </strong> <span class="label {{($village->caste_status == 'High') ? 'label-success' : ''}} {{($village->caste_status == 'Medium') ? 'label-info' : ''}} {{($village->caste_status == 'Low') ? 'label-warning' : ''}}">{{$village->caste_status}}</span> <br>{{$village->caste_status_detail}} </li>
                                        <li><strong>Distance from PPES:</strong> {{$village->distance}} km</li>
                                        
                                        </ul>
                                    </div>

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
                                    <p>Video recording(s) of feedback of {{$member->name}} and Audio recording done by Pragya Baseria.</p>
                                    @foreach (explode(', ', $member->feedback_recordings) as $feedback_recording)
                                        @if(strpos($feedback_recording,'dropbox') !== false)
                                          <div class="wrapper">
                                          <video id="my-video" class="video-js vjs-default-skin" controls preload="none"data-setup="{}" width="auto" height="auto" >
                                            <source src="{{ $feedback_recording }}" type='video/mp4'>                                     
                                            <p class="vjs-no-js">
                                              To view this video please enable JavaScript, and consider upgrading to a web browser that
                                              <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                            </p>
                                      </video>
                                      </div>
                                      <br>
                                    @elseif(strpos($feedback_recording,'google') !== false)
                                        <p><strong>Audio Recording</strong></p> 
                                        <iframe src="{{$feedback_recording}}" width="auto" height="auto"></iframe>
                                    @endif                                     
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
