@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-xs-4">

      <ul>
        <li><a href="/my/form">View Lead Form</a></li>
        <li><a href="/my/form">Edit Lead Form</a></li>
      </ul>

    </div>
    <div class="col-xs-8">
      <h1>Create a Lead Form</h1>
      <form class="form-horizontal" role="form" method="POST" action="{{ url('/create') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <label class="control-label">Title</label>
          <input type="text" class="form-control" name="title" value="{{ old('title') }}">
        </div>

        <div id="photos">
          <div class="form-group">
            <label class="control-label">Take a Photo of</label>
            <input type="text" class="form-control" name="photos[]" value="{{ old('photo[0]') }}">
          </div>
        </div>

        <div class="form-group">
          <button id="add_photo" class="btn btn-sm btn-default">
            <span class="glyphicon glyphicon-plus"></span>
            Add Photo Request
          </button>
        </div>

        <div class="form-group">
          <label class="control-label">Ask a question</label>
          <input type="text" class="form-control" name="textfields[0]" value="{{ old('textfields[0]') }}">
        </div>

        <div class="form-group">
          <button class="btn btn-sm btn-default">
            <span class="glyphicon glyphicon-plus"></span>
            Add Textfield
          </button>
        </div>

        <div class="form-group">
          <div class="checkbox">
            <label>
              <input type="checkbox" value="1" name="location"> Collect the Lead's Location
            </label>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label">Send Leads to E-Mail</label>
          <input type="email" class="form-control" name="email" value="{{ old('email') }}">
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection