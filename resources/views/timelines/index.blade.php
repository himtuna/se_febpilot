@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{!!asset('css/timeline.css')!!}">
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="well">
                <legend>Timeline of Febpilot <a href="{{url('timelines/create')}}" class="btn btn-default pull-right">+Event</a></legend>
                <div></div>
                @if (session('status'))
                    <div class="alert alert-info">
                        
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true" aria-label="close">×</button>
                        {{ session('status') }}
                    </div>
                @endif

                @if($timelines->isempty())
                <div class="alert alert-info">Please create an event.</div>
                @endif

                @foreach($timelines as $timeline)

                <div class="message-item" id="{{$timeline->id}}">
                    <div class="panel {{($timeline->tags == 'info') ? "panel-info" : ''}}
                        {{($timeline->tags == 'warning') ? "panel-warning" : ''}}
                        {{($timeline->tags == 'success') ? "panel-success" : ''}}
                        {{($timeline->tags == 'danger') ? "panel-danger ": ''}}
                        {{($timeline->tags == "default") ? "panel-default" : ''}}
                        
                        
                     panel-comment ">
                        <div class="panel-heading comment">
                        <h4><a href="#event-{{$timeline->id}}" data-toggle="collapse" style="text-decoration:inherit;color:inherit">{{$timeline->title}} <small style="color:inherit"><i class="fa fa-arrow-down"></i></small></a></h4>
                        <span>{{$timeline->subtitle}}</span>
                        </div>

                        <div class="panel-body collapse" id="event-{{$timeline->id}}">
                        
                            {!!$timeline->body!!}
                        </div>
                        <div class="panel-footer">
                            {{$timeline->date}}
                            <span class="pull-right">#{{$timeline->weight}} <small><a href="{{url('timelines/'.$timeline->id.'/edit')}}">Edit</a></small></span>
                            
                        </div>
                    </div>
                </div>



                   
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
