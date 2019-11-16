@extends('layouts.template')

@section('title', 'ログイン')
@section('description', 'エンジニアのマッチングサイト「match!」のログインページです。案件の依頼や応募、プロジェクトへの参加を簡単に、気軽に行えるようにする「エンジニアのマッチングサイト」です。')
@section('keyword', 'match, 案件, エンジニア, マッチング, 気軽')
@include('layouts.head')

@section('contents')

<main class="main">

		<form action="/login" method="post" class="p-form">
		{{ csrf_field() }}
			<h1 class="c-title u-center u-mb_xl">ログイン</h1>
			<?php /*バリデーションの表示*/ ?>
			@foreach ($errors -> all() as $error)
			<p class="u-error">{{ $error }}</p>
			@endforeach
			
			<div class="p-form__content">
				<p>
					<span class="c-form__title">Email</span>
					<input type="text" name="email" placeholder="email" class="c-form__text" value="{{ old('email') }}">
				</p>
				<p class="u-mb_xl">
					<span class="c-form__title">Password</span>
					<input type="password" name="password" placeholder="password" class="c-form__text">
					<span class="c-form__title"><a href="password/reset">>>パスワードを忘れた方はこちらへ</a></span>
				</p>
				<input type="submit" name="submit" value="ログイン" class="c-form__button">
			</div>
		</form>
	</main>

@endsection
