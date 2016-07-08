@extends('layouts.app')

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
                                <strong>{{$member->name}}</strong>
                                </div><!-- /thumbnail -->
                                </div><!-- /col-sm-1 -->

                                <div class="col-sm-10">
                                <div class="panel {{($member->samhu_saheli == 1) ? 'panel-info' : 'panel-default'}} panel-comment">
                                <div class="panel-heading comment">
                                <strong>{{$member->name}} {{($member->samhu_saheli == 1) ? '(Samhu Saheli)' : ''}}</strong>
                                </div>
                                <div class="panel-body">
                                
                                @if($member->feedback == NULL)
                                <div class="alert alert-info"><p><strong>No Record Found!</strong> Feedback not available!</p></div>
                                @else 
                                {!!$member->feedback!!}
                                @endif
                                 
                                <br><strong>Feedback on videos</strong>
                                <ul>
                                @foreach($member->feedbacks as $feedback)
                                <li><a href="{{url('feedbacks/'.$feedback->id)}}"> {{$feedback->video->short_title}} : {{$feedback->video->name}} ({{$feedback->video->video_stack->short_title}})</a></li>
                                @endforeach
                                </ul>   
                                
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
@endsection
