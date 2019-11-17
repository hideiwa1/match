<!DOCTYPE html>
<html lang="ja">

<head>
	@yield('head')
</head>

<body id="body" class="body">

	<header id="header" class="header">
		<h1>
			<a href="/" class="p-logo">match!</a>
		</h1>
		<nav>
			<div id="js-menu"></div>
		</nav>
		@if(session('message'))
		<div class="js-flash p-flash u-flex-flash">
			<span>{{session('message')}}</span></div>
		@endif
	</header>

  @yield('contents')

	<footer class="footer">
		<p>Copyright <a href="/">match!</a> All Right Reserved</p>
		<script src="https://polyfill.io/v3/polyfill.min.js?features=Object.values"></script>
		@if(app('env') == 'local')
		<script src="{{ asset('/js/app.js') }}"></script>
		@else
		<script src="{{ secure_asset('/js/app.js') }}"></script>
		@endif
		<script>
		$(function(){
			setTimeout(function(){
				$('.js-flash').slideToggle('slow')}, 3000
			);
		});
		</script>
	</footer>

</body>

</html>
