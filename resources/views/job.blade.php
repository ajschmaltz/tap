@extends ('app')

@section ('content')

<div id="fullpage">

  <div class="section">
    <header></header>
    <div class="row screen">
      <div class="col-lg-6 col-lg-push-3 col-md-8 col-md-push-2 col-sm-10 col-sm-push-1">
        <h1 class="text-center">{{ $title }}</h1>
        <ul class="list-group">

          @if ($location)
          <li class="list-group-item"><span class="lead">Mark your location.</span></li>
          @endif

          @foreach ($steps as $step)
          <li class="list-group-item"><span class="lead">Take a photo of {{ $step }}</span></li>
          @endforeach

        </ul>
      </div>
    </div>
  </div>

  @if ($location)
  @include ('blocks.location')
  @endif

  @foreach ($steps as $step)
  @include ('blocks.fine-uploader')
  @endforeach

  <div class="section">
    <div class="row screen">
      <div class="col-lg-6 col-lg-push-3 col-md-8 col-md-push-2 col-sm-10 col-sm-push-1">
        <h1 class="text-center">Get a Quote</h1>
        <input class="form-control" type="text" placeholder="Enter your phone number" />
      </div>
    </div>
  </div>
</div>

@endsection