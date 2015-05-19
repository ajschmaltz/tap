@extends ('app')

@section ('content')

<header></header>

<div id="fullpage">

  <div class="section">
    <div class="row screen">
      <div class="col-lg-6 col-lg-push-3 col-md-8 col-md-push-2 col-sm-10 col-sm-push-1">
        <h1 class="text-center">Get a quote for tree removal.</h1>
        <hr/>
        <ul>
          <li class="lead">Take a photo of the tree you need removed</li>
          <li class="lead">Take a photo of any obsticals we need to know about</li>
          <li class="lead">Mark the location of the job</li>
          <li class="lead">Provide your contact information</li>
        </ul>
      </div>
    </div>
    <footer onclick="fullpage.moveSectionDown();">
      START
    </footer>
  </div>

  <div class="section">
    <div class="row screen">
      <div class="col-lg-6 col-lg-push-3 col-md-8 col-md-push-2 col-sm-10 col-sm-push-1">
        <h1 class="text-center">Take a photo of the tree you need removed.</h1>
        <div id="fine-uploader">
        </div>
        <div class="text-center">
          <div class="gallery"></div>
          <div id="one">
            <img class="tap" src="/tap.jpg" />
          </div>
        </div>
      </div>
    </div>
    <footer onclick="fullpage.moveSectionDown();">
      NEXT
    </footer>
  </div>

  <div class="section">
    <div class="row screen">
      <div class="col-lg-6 col-lg-push-3 col-md-8 col-md-push-2 col-sm-10 col-sm-push-1">
        <h1 class="text-center">Take a photo of any obvious obstacles.</h1>
        <div class="text-center">
          <div class="gallery"></div>
          <div id="two">
            <img class="tap" src="/tap.jpg" />
          </div>
        </div>
      </div>
    </div>
    <footer onclick="fullpage.moveSectionDown();">
      NEXT
    </footer>
  </div>

  <div class="section">
    <div class="row screen">
      <div class="col-lg-6 col-lg-push-3 col-md-8 col-md-push-2 col-sm-10 col-sm-push-1">
        <h1 class="text-center">Where is the job?</h1>
        <div id="map-canvas" style="height: 300px;"></div>
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