@extends('app')

@section('content')
<form class="form-horizontal" role="form" method="POST" action="{{ url('/create') }}">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">

  <div class="form-group">
    <label class="col-md-4 control-label">Title</label>
    <div class="col-md-6">
      <input type="text" class="form-control" name="title" value="{{ old('title') }}">
    </div>
  </div>

  <div id="photos">
    <div class="form-group">
      <label class="col-md-4 control-label">Take a Photo of</label>
      <div class="col-md-6">
        <input type="text" class="form-control" name="photos[]" value="{{ old('photo[0]') }}">
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-push-4 col-md-6">
      <button id="add_photo" class="btn btn-sm btn-default">
        <span class="glyphicon glyphicon-plus"></span>
        Add Photo Request
      </button>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label">Ask a question</label>
    <div class="col-md-6">
      <input type="text" class="form-control" name="textfields[0]" value="{{ old('textfields[0]') }}">
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-push-4 col-md-6">
      <button class="btn btn-sm btn-default">
        <span class="glyphicon glyphicon-plus"></span>
        Add Textfield
      </button>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-6 col-md-offset-4">
      <div class="checkbox">
        <label>
          <input type="checkbox" value="1" name="location"> Collect the Job's Location
        </label>
      </div>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label">Send Jobs to E-Mail</label>
    <div class="col-md-6">
      <input type="email" class="form-control" name="email" value="{{ old('email') }}">
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-6 col-md-offset-4">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </div>
</form>
@endsection