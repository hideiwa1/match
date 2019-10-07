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
	</header>

  @yield('contents')

	<footer class="footer">
		<p>Copyright <a href="/">match!</a> All Right Reserved</p>
		<script src="{{ asset('/js/app.js') }}"></script>
	</footer>

</body>

</html>
