@extends('layouts.template')

@section('title', 'message')
@include('layouts.head')

@section('contents')

<main class="main">

	<article class="u-mb_l">
		<h1 class="c-title u-center u-mb_m">ユーザーさんとのダイレクトメッセージ</h1>
		<section class="p-form">

			<div class="u-flex u-mb_m">
				<div class="p-message__pic">
					<img src="" class="c-img">
				</div>
				<div class="p-message--right c-textbox">
					<span>コメント内容</span><br>
					<span class="c-date">投稿日時</span>
				</div>
			</div>

			<div class="u-flex u-mb_m">
				<div class="p-message--left c-textbox">
					<span>コメント内容</span><br>
					<span class="c-date">投稿日時</span>
				</div>
				<div class="p-message__pic">
					<img src="" class="c-img">
				</div>
			</div>

			<form>
				<h1 class="c-title u-center u-mb_m">メッセージ送信</h1>
				<div class="p-form__content">
					<textarea class="c-textarea"></textarea>
					<input type="submit" name="submit" value="送信" class="c-formbutton">
				</div>
			</form>
		</section>
	</article>
</main>

@endsection
