@extends('layouts.app')

@section('content')
<script src="//cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script>
<script   src="https://code.jquery.com/jquery-1.12.4.min.js"   integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="   crossorigin="anonymous"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">        
            <div class="panel panel-default">
                <div class="panel-heading">Add an event to timeline</div>

                <div class="panel-body">

                <form action="{{url('timelines')}}" method="post">
                    <div class="form-group">
                    <label for="title">Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>

                    <div class="form-group">
                    <label for="subtitle">Subtitle</label>
                        <input type="text" name="subtitle" class="form-control">
                    </div>

                    <div class="form-group">
                    <label for="date">Date</label>
                        <input type="text" name="date" class="form-control" placeholder="Enter date for this event">
                    </div>

                    <div class="form-group">
                    <label for="body">Body</label>
                        <textarea name="body" id="body" class="ckeditor" ></textarea>
                    </div>

                    <div class="form-group form-inline">
                    <label for="tags">Tags: </label>
                        <input type="text" name="tags" class="form-control">
                        <p class="help-block">Enter tags for classification, heading and color coding</p>
                    </div>
                    <div class="form-group">
                    <label for="images">Images</label>
                        <input type="text" name="images" class="form-control">
                        <p class="help-block">Enter comman separated relative URLs</p>
                    </div>
                    <div class="form-group">
                    <label for="videos">Videos</label>
                        <input type="text" name="videos" class="form-control">
                        <p class="help-block">Enter comman separated full URLs</p>
                    </div>

                    <div class="form-group form-inline">
                    <label for="weight">Weight: </label>
                        <input type="number" name="weight" class="form-control">
                    </div>
                        
                    <div class="form-group">
						<button type="submit" class="btn btn-primary">Add event</button>
					</div>
				    {{csrf_field()}}
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    
    CKEDITOR.replace('.cekditor');    
</script>
@endsection
