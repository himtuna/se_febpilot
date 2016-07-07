@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">        
            <div class="panel panel-default">
                <div class="panel-heading">Feedback on Videos</div>

                <div class="panel-body">               
                

                <ul class="nav nav-tabs">
                    <?php $i=0; ?>
                    @foreach($videostacks as $videostack)                    
                        <li {{($i==0) ? 'class=active': ''}}><a data-toggle="tab" href="#menu{{$videostack->id}}">{{$videostack->short_title}} <span class="badge"></span></a></li>
                        <?php $i++;?>
                    @endforeach
                    <li><a href="{{url('videos/create')}}" class="btn-success">+ Video</a></li>
                  </ul>
                  
                        
                        <div class="tab-content">
                            <?php $i=0; ?>
                            @foreach($videostacks as $videostack)
                            
                            <div id="menu{{$videostack->id}}" class="tab-pane fade {{($i==0) ? 'in active': ''}}">
                                <h3>{{$videostack->name}}</h3>
                                @foreach($videostack->videos as $video)
                                
                                <div class="row">
                                <div class="col-sm-4">
                                <div class="thumbnail">
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

                                <div class="col-sm-8">
                                <div class="panel panel-default panel-comment">
                                <div class="panel-heading comment">
                                <strong>{{$video->name}}</strong>
                                </div>
                                <div class="panel-body">
                                
                                @if($video->feedback == NULL)
                                <div class="alert alert-info"><p><strong>No Record Found!</strong> Feedback not available!</p></div>
                                @else 
                                {!!$video->feedback!!}
                                @endif
                                
                                </div><!-- /panel-body -->
                                <div class="panel-footer"> Rating: {{$video->liked}}
                                <a href="{{url('videos/'.$video->id.'/edit')}}" class="pull-right"><i class="fa fa-pencil"></i> Edit Feedback</a>
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
