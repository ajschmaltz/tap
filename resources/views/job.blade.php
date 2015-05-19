@extends ('app')

@section ('content')

<header></header>

<div id="fullpage">

  <div class="section">
    <div class="row screen">
      <div class="col-lg-6 col-lg-push-3 col-md-8 col-md-push-2 col-sm-10 col-sm-push-1">
        <h1 class="text-center">Take a photo of the tree you need removed.</h1>
        <hr/>
        <div id="fine-uploader">
        </div>
        <div class="text-center">
          <div class="gallery"></div>
          <div class="btn btn-primary" id="one">Take a Photo</div>
        </div>
      </div>
    </div>
    <footer>
      <button onclick="fullpage.moveSectionDown();" class="btn btn-default">Next</button>
    </footer>
  </div>

  <div class="section">
    <div class="row screen">
      <div class="col-lg-6 col-lg-push-3 col-md-8 col-md-push-2 col-sm-10 col-sm-push-1">
        <h1 class="text-center">Take a photo of any obvious obsticles.</h1>
        <hr/>
        <div class="text-center">
          <div class="gallery"></div>
          <div class="btn btn-primary" id="two">Take a Photo</div>
        </div>
      </div>
    </div>
    <footer>
      <button onclick="fullpage.moveSectionDown();" class="btn btn-default">Next</button>
    </footer>
  </div>

  <div class="section">
    <div class="row screen">
      <div class="col-lg-6 col-lg-push-3 col-md-8 col-md-push-2 col-sm-10 col-sm-push-1">
        <h1 class="text-center">Where is the job?</h1>
        <hr/>
        <div id="map-canvas" style="height: 300px;"></div>
      </div>
    </div>
    <footer>
      <button onclick="fullpage.moveSectionUp();" class="btn btn-default">Back</button>
      <button onclick="fullpage.moveSectionDown();" class="btn btn-default">
        <span class="glyphicon glyphicon-arrow-down"></span>
        Next
      </button>
    </footer>
  </div>

  <div class="section">
    <div class="row screen">
      <div class="col-lg-6 col-lg-push-3 col-md-8 col-md-push-2 col-sm-10 col-sm-push-1">
        <h1 class="text-center">Get a Quote</h1>
        <hr/>
        <input class="form-control" type="text" placeholder="Enter your phone number" />
      </div>
    </div>
  </div>
  <footer>
    <button onclick="fullpage.moveSectionUp();" class="btn btn-default">Back</button>
    <button class="btn btn-success">Done</button>
  </footer>
</div>

@endsection