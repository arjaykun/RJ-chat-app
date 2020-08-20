<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>
	<title>Document</title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">

	<style>
		.rounded {
			border-radius: 12px !important;
		}

		.my-container {
			width: 420px;
		}

		.btn {
			text-align: left !important;
		}
	</style>
</head>
<body>

	<div class="bg-light" id="app">
		@yield('content')		
	</div>

	<script src="{{ asset('js/app.js') }}"></script>
	<script src="https://kit.fontawesome.com/5f55851da7.js" crossorigin="anonymous"></script>
</body>
</html>