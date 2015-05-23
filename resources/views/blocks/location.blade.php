<div class="section">
  <div class="row screen">
    <div class="col-lg-6 col-lg-push-3 col-md-8 col-md-push-2 col-sm-10 col-sm-push-1">
      <h1 class="text-center">Where is the job?</h1>
      <div id="map-canvas" style="height: 45vh;"></div>
      <hr/>
      <div class="input-group">
        <input id="latitude" type="hidden" name="latitude"/>
        <input id="longitude" type="hidden" name="longitude"/>
        <input id="address" class="form-control" placeholder="Enter your address" />
        <span class="input-group-btn">
          <button id="geocode" class="btn btn-default" type="button">Go!</button>
        </span>
      </div>
    </div>
  </div>
</div>