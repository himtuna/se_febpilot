@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome to Social Emergence Dashboard!</div>

                <div class="panel-body">
                @if (Auth::guest()) 
                    Please login to access the Dashboard. <a href="{{url('login')}}">Login here.</a>
                @else
                    Welcome to Social Emergence Dashboard. You may access the Feb Pilot details from above menu.
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
