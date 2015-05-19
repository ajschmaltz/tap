@extends ('app')

@section ('content')

<header></header>

<div id="fullpage">

  <div class="section">
    <div class="row screen">
      <div class="col-lg-6 col-lg-push-3 col-md-8 col-md-push-2 col-sm-10 col-sm-push-1">
        <h1 class="text-center">Get a quote for lawn care.</h1>
        <hr/>
        <ul>
          <li class="lead">Take a photo of your front yard.</li>
          <li class="lead">Take a photo of your side yard.</li>
          <li class="lead">Take a photo of your back yard.</li>
          <li class="lead">Mark your location.</li>
        </ul>
      </div>
    </div>
    <footer onclick="fullpage.moveSectionDown();">
      START
    </footer>
  </div>

  @foreach ($steps as $step)
  @include ('blocks.fine-uploader')
  @endforeach

  <div class="section">
    <div class="row screen">
      <div class="col-lg-6 col-lg-push-3 col-md-8 col-md-push-2 col-sm-10 col-sm-push-1">
        <h1 class="text-center">Where is the job?</h1>
        <div id="map-canvas" style="height: 45vh;"></div>
        <hr/>
        <input class="form-control" placeholder="Enter your address" />
      </div>
    </div>
    <footer onclick="fullpage.moveSectionDown();">
      NEXT
    </footer>
  </div>

  <div class="section">
    <div class="row screen">
      <div class="col-lg-6 col-lg-push-3 col-md-8 col-md-push-2 col-sm-10 col-sm-push-1">
        <h1 class="text-center">Get a Quote</h1>
        <input class="form-control" type="text" placeholder="Enter your phone number" />
      </div>
    </div>
  </div>
  <footer>
    DONE
  </footer>
</div>

@endsection