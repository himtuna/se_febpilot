@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">        
            <div class="panel panel-primary">
                <div class="panel-heading">Feedbacks Woman by Woman, Video by Video</div>

                <div class="panel-body">
            		<ul class="nav nav-tabs col-sm-offset-3">
	                    <?php $i=0; ?>
	                    @foreach($videostacks as $videostack)                    
	                        <li {{($i==0) ? 'class=active': ''}}><a data-toggle="tab" href="#menu{{$videostack->id}}">{{$videostack->short_title}} <span class="badge"></span></a></li>
	                        <?php $i++;?>
	                    @endforeach
	                    <li><a href="{{url('feedbacks/create')}}" class="btn-success">+ Feedback</a></li>
                    </ul>
	                    
	                     <div class="tab-content">
                            <?php $i=0; ?>
                            @foreach($videostacks as $videostack)
                                <div id="menu{{$videostack->id}}" class="tab-pane fade {{($i==0) ? 'in active': ''}}">
                                <!-- Video Pills -->
	                                

	                                <div class="container">
		                                <ul class="nav nav-pills nav-stacked col-sm-2">
		                                <?php $j=0; ?>
		                                @foreach($videostack->videos as $video)									
											<li {{($j==0) ? 'class=active': ''}}><a data-toggle="tab" href="#video{{$video->id}}">{{$video->short_title}} <span class="badge"></span></a></li>
											<?php $j++;?>
		                                @endforeach
		                                </ul>
		                                <!-- Video Pills Tabs -->
										<br>
		                                <div class="tab-content col-sm-offset-2">
		                                	
											<?php $j=0; ?>
				                            @foreach($videostack->videos as $video)
				                                <div id="video{{$video->id}}" class="tab-pane fade {{($j==0) ? 'in active': ''}}">
													<!-- Feedbacks -->
													<div class="row">
						                                <div class="col-sm-4">
						                                <div class="">
						                                <?php 
						                                if($video->youtube_link !=''){
						                                    $video_id = explode("?v=", $video->youtube_link);
						                                    $video_id = $video_id[1];
						                                }
						                                else $video_id = '';
						                                ?>
						                                @if($video_id != '')
						                                <iframe width="100%" src="https://www.youtube.com/embed/{{$video_id}}" frameborder="0" allowfullscreen></iframe>@endif
						                                <strong>{{$video->name}}</strong>
						                                </div><!-- /thumbnail -->
						                                </div><!-- /col-sm-1 -->

						                                <div class="col-sm-4">
						                                <div class="panel panel-default panel-comment">
						                                
						                                <div class="panel-body">
						                                {{$video->video_stack->short_title}}: {{$video->video_stack->name}} <br>
						                                Video: {{$video->short_title}} <br>
						                                Overall Rating: {{$video->liked}}<br>
						                                Other stats: 
						                                </div><!-- /panel-body -->
						                                
						                                </div><!-- /panel panel-default -->
						                                </div><!-- /col-sm-5 -->
					                                </div> <hr>


													@foreach($video->feedbacks as $feedback)

														 <div class="row">
							                                <div class="col-sm-2">
							                                <div class="thumbnail">
							                                <img class="img-responsive user-photo" @if(isset($feedback->member->image)) src="{{url($feedback->member->image)}}" @else src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png" @endif>
							                                <strong>{{$feedback->member->name}}</strong>
							                                </div><!-- /thumbnail -->
							                                </div><!-- /col-sm-1 -->

							                                <div class="col-sm-6">
							                                <div class="panel panel-default panel-comment">
							                                <div class="panel-heading comment">
							                                <strong>{{$feedback->member->name}}</strong> <em>{{$feedback->video_liked}} this video</em>
							                                </div>
							                                <div class="panel-body">
							                                
							                                <strong>Feedback:</strong>{!!$feedback->detail!!}
							                                <strong>Quote:</strong>{!!$feedback->quote!!}

							                                
							                                </div><!-- /panel-body -->
							                                <div class="panel-footer">Village: {{$feedback->member->village->name}} 
							                                <a href="{{url('feedbacks/'.$feedback->id.'/edit')}}" class="pull-right"><i class="fa fa-pencil"></i> Edit Feedback</a>
							                                </div>
							                                </div><!-- /panel panel-default -->
							                                </div><!-- /col-sm-6 -->
						                                </div>
													@endforeach

													<!-- Feedbacks -->
								                </div>
							                <?php $j++; ?>    
						                    @endforeach
							                  
		                                </div>

		                            </div>
	                            </div>
	                            <?php $i++;?>
                            @endforeach
                        </div>
                  	</ul>
                   
                </div>
                <!-- Panel Body -->
            </div>
        </div>
    </div>
</div>
@endsection
