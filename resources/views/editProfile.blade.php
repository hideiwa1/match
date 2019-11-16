@extends('layouts.template')

@section('title', 'プロフィール編集')
@section('description', 'エンジニアのマッチングサイト「match!」のプロフィール編集ページです。案件の成約、受注率のアップのためにも、プロフィールを充実させましょう。')
@section('keyword', 'match, 案件, エンジニア, マッチング, 気軽')
@include('layouts.head')

@section('contents')

<main class="main">

	<article class="p-form u-mb_l">
	
		<section>
		<h1 class="c-title u-center u-mb_m">プロフィール編集</h1>
			<?php /*バリデーションの表示*/ ?>
			@foreach ($errors -> all() as $error)
			<p class="u-error">{{ $error }}</p>
			@endforeach
		<form action="/editProfile" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="p-form__content">

				<div class="u-mb_m">
					<span class="c-form__title">プロフィール画像</span>
					<div id="js-profpic" class="c-img__profile c-img__form">
					</div>
				</div>
				
					<p class="u-mb_m">
						<span class="c-form__title">ユーザー名</span>
						<input type="text" name="name" placeholder="name" class="c-form__text" value="{{old('name') ? old('name') : $data->name}}">
					</p>
					<p class="u-mb_m">
						<span class="c-form__title">メールアドレス</span>
						<input type="email" name="email" placeholder="email" class="c-form__text" value="{{old('email') ? old('email') : $data->email}}">
					</p>
					<p class="u-mb_m">
						<span class="c-form__title">プロフィール文</span>
						<textarea name="comment" class="c-textarea" rows="5">{{old('comment') ? old('comment') : $data->comment}}</textarea>
					</p>
					<input type="submit" value="登録する" class="c-form__button">
				

			</div>
			</form>
		</section>

	</article>

</main>

@endsection