<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('/css/fullpage.css') }}" rel="stylesheet" type="text/css"/>
	<title>Laravel</title>
</head>
<body>

	@yield('content')

  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
  <script src="{{ asset('/fine-uploader/fine-uploader.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/js/fullpage.min.js') }}"></script>
  <script src="{{ asset('/js/app.js') }}"></script>

</body>
</html>
