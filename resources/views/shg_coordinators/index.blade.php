@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">        
            <div class="panel panel-default">
                <div class="panel-heading">SHG Coordinators</div>

                <div class="panel-body">               
                

                           @foreach($shg_coordinators as $shg_coordinator)
                                <a name="{{$shg_coordinator->id}}"></a>
                                <div class="row">
                                <div class="col-sm-2">
                                <div class="thumbnail">
                                <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                                <strong>{{$shg_coordinator->name}}</strong>
                                </div><!-- /thumbnail -->
                                </div><!-- /col-sm-1 -->

                                <div class="col-sm-10">
                                <div class="panel panel-default panel-comment">
                                <div class="panel-heading comment">
                                <strong>{{$shg_coordinator->name}}</strong>
                                </div>
                                <div class="panel-body">
                                
                                @if(isset($shg_coordinator->feedback))
                                {!!$shg_coordinator->feedback!!}
                                @else <div class="alert alert-info"><p><strong>No Record Found!</strong> Feedback not available!</p></div>
                                @endif
                                <hr>
                                SHG Coordinator for Village(s):
                                <ul>
                                @foreach($shg_coordinator->villages  as $village)
                                    <li>
                                    <a href="{{url('villages/'.$village->id)}}">{{$village->name}}</a>
                                    </li>
                                @endforeach
                                </ul>
                                </div><!-- /panel-body -->
                                <div class="panel-footer">Phone: {{$shg_coordinator->phone}} 
                                <a href="{{url('shg-coordinators/'.$shg_coordinator->id.'/edit')}}" class="pull-right"><i class="fa fa-pencil"></i> Edit Feedback</a>
                                </div>
                                </div><!-- /panel panel-default -->
                                </div><!-- /col-sm-5 -->
                                </div> <!-- row -->

                            @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
