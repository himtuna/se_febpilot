<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Social Emergence | Feedback Dashboard</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }

        .panel-comment {
            position:relative;
        }
        .comment:after,.comment:before{
            position:absolute;
            top:11px;left:-16px;
            right:100%;
            width:0;
            height:0;
            display:block;
            content:" ";
            border-color:transparent;
            border-style:solid solid outset;
            pointer-events:none;
        }
        .comment:after{
            border-width:7px;
            border-right-color:#f7f7f7;
            margin-top:1px;
            margin-left:2px;
        }
        .comment:before{
            border-right-color:#ddd;
            border-width:8px;
        }
        blockquote>p {
            font-family: Georgia, "Times New Roman", Times, serif;
            font-style: italic;
        }
        blockquote {
          background: #f9f9f9;
          border-left: 0px solid #ccc;
          margin: 1.5em 10px;
          padding: 0.5em 10px;
          quotes: "\201C""\201D""\2018""\2019";
        }
        blockquote:before {
          color: #ccc;
          content: open-quote;
          font-size: 4em;
          line-height: 0.1em;
          margin-right: 0.25em;
          vertical-align: -0.4em;
        }
        blockquote p {
          display: inline;
        }

        /*.bs-callout-info {
            border-left-color: #1b809e;
        }
        .bs-callout {
            padding: 20px;
            margin: 20px 0;
            border: 1px solid #eee;
            border-left-width: 5px;
            border-radius: 3px;
        }
        .bs-callout-info h4 {
            color: #1b809e;
        }
        .bs-callout h4 {
            margin-top: 0;
            margin-bottom: 5px;
        }
        .bs-callout p:last-child {
            margin-bottom: 0;
        }*/
        .bs-callout{padding:20px;margin:20px 0;border:1px solid #eee;border-left-width:5px;border-radius:3px}.bs-callout h4{margin-top:0;margin-bottom:5px}.bs-callout p:last-child{margin-bottom:0}.bs-callout code{border-radius:3px}.bs-callout+.bs-callout{margin-top:-5px}.bs-callout-danger{border-left-color:#ce4844}.bs-callout-danger h4{color:#ce4844}.bs-callout-success{border-left-color:#aa6708}.bs-callout-success h4{color:#aa6708}.bs-callout-feedback{border-left-color:#1b809e}.bs-callout-feedback h4{color:#1b809e}.bs-callout-tech{border-left-color:#1b9e8c}.bs-callout-tech h4{color:#1b9e8c}
        .feedback-after {
            border-left-width:0px;
            border-top-width:5px;
            border-top-color:green;
        }
        .feedback-before{
            border-left-width:0px;
            border-top-width:5px;
            border-top-color:yellow;
        }
    </style>
@yield('head')
</head>
<body id="app-layout">
<!-- <div class="alert alert-info alert-dismissable page-alert text-center">Localhost</div> -->
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Social Emergence
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
               
               @if (Auth::check())

  
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/members') }}">SHG Women</a></li>
                </ul>

                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/videos') }}">Videos</a></li>
                </ul>

                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/feedbacks') }}">Specific Feedback</a></li>
                </ul>

                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/self-help-groups') }}">SHG Details</a></li>
                </ul>

                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/villages') }}">Villages</a></li>
                </ul>

                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/shg-coordinators') }}">SHG Coordinators</a></li>
                </ul>

                
               @endif

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <!-- <li><a href="{{ url('/register') }}">Register</a></li> -->
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
