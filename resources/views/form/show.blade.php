@extends ('app')

@section ('content')

<form method="post" action="/lead" id="fullpage">

  <input type="hidden" name="_token" value="{{ csrf_token() }}">

  <div class="section">
    <header></header>
    <div class="row screen">
      <div class="col-lg-6 col-lg-push-3 col-md-8 col-md-push-2 col-sm-10 col-sm-push-1">
        <h1 class="text-center">
          {{ $form->title }}
          <br/>
          <small>To get a quote just complete these steps</small>
        </h1>
        <ul class="list-group">

          @if ($form->location)
          <li class="list-group-item"><span class="lead">
              <span class="glyphicon glyphicon-map-marker"></span>
              Mark your location.
            </span>
          </li>
          @endif

          @foreach (json_decode($form->photos) as $photo)
          <li class="list-group-item">
            <span class="lead">
              <span class="glyphicon glyphicon-camera"></span>
              Take a photo of {{ $photo }}
            </span>
          </li>
          @endforeach

          <li class="list-group-item">
            <span class="lead">
              <span class="glyphicon glyphicon-ok"></span>
              Submit your job.
            </span>
          </li>

        </ul>
      </div>
    </div>
  </div>

  @if ($form->location)
  @include ('blocks.location')
  @endif

  @foreach (json_decode($form->photos) as $photo)
  @include ('blocks.fine-uploader')
  @endforeach

  <div class="section">
    <div class="row screen">
      <div class="col-lg-6 col-lg-push-3 col-md-8 col-md-push-2 col-sm-10 col-sm-push-1">
        <h1 class="text-center">Get a Quote</h1>
        <div class="form-group">
          <input class="form-control" name="phone" type="text" placeholder="Enter your phone number" />
        </div>
        <div class="form-group">
          <textarea class="form-control" name="details"></textarea>
        </div>
        <div class="form-group">
          <input class="btn btn-success" type="submit" value="Submit" />
        </div>
      </div>
    </div>
  </div>
</form>

@endsection