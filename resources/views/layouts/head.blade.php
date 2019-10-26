@section('head')
<?php
ini_set('display_errors', 1);
?>
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
@if(Request::is('detail/*'))
<meta name=”twitter:card” content=”summary“>
<meta name=”twitter:site” content=”@hideiwa1“>
<meta name=”twitter:title” content={{$detail -> title}}>
<meta name=”twitter:description” content={{$detail -> comment}}>
<meta name=”twitter:image” content=”match.jpg“>
@endif
<script src="https://kit.fontawesome.com/cf99747a60.js" crossorigin="anonymous"></script>
<title>@yield('title')</title>
@if(app('env') == 'local')
<link rel="stylesheet" href="{{ (asset('/css/app.css')) }}">
@else
<link rel="stylesheet" href="{{ (secure_asset('/css/app.css')) }}">
@endif
@endsection
