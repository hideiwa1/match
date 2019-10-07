@extends('layouts.template')

@section('title', 'login')
@include('layouts.head')

@section('contents')

<main class="main">

		<form action="/login" method="post" class="p-form">
		{{ csrf_field() }}
			<h1 class="c-title u-center u-mb_xl">ログイン</h1>
			<div class="p-form__content">
				<p>
					<span class="c-formtitle">Email</span>
					<input type="text" name="email" placeholder="email" class="c-textform" value="{{ old('email') }}">
				</p>
				<p class="u-mb_xl">
					<span class="c-formtitle">Password</span>
					<input type="password" name="password" placeholder="password" class="c-textform">
					<span class="c-formtitle"><a href="password/reset">>>パスワードを忘れた方はこちらへ</a></span>
				</p>
				<input type="submit" name="submit" value="ログイン" class="c-formbutton">
			</div>
		</form>
	</main>

@endsection
