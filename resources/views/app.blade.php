<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('/css/fullpage.css') }}" rel="stylesheet" type="text/css"/>
	<title>Laravel</title>
</head>
<body>

	@yield('content')

  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
  <script src="{{ asset('/fine-uploader/fine-uploader.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/js/fullpage.min.js') }}"></script>
  <script src="{{ asset('/js/app.js') }}"></script>

</body>
</html>
