@extends('layouts.template')

@section('title', 'ダイレクトメッセージ')
@section('description', 'エンジニアのマッチングサイト「match!」のDMページです。案件の依頼や応募、プロジェクトへの参加を簡単に、気軽に行えるようにする「エンジニアのマッチングサイト」です。')
@section('keyword', 'match, 案件, エンジニア, マッチング, 気軽')
@include('layouts.head')

@section('contents')

<main class="main">

	<article class="u-mb_l">
		<h1 class="c-title u-center u-mb_m">
			<?php /*相手ユーザーの判別*/ ?>
			@if($bord -> from_user_id === $user)
			<div class="p-message__pic c-img__msg u-inline">
			<img src="{{$bord -> toUser -> pic}}" class="c-img">
			</div>
			{{$bord -> toUser -> name}}
			@else
			<div class="p-message__pic c-img__msg u-inline">
			<img src="{{$bord -> fromUser -> pic}}" class="c-img">
			</div>
			{{$bord -> fromUser -> name}}
			@endif
			さんとのダイレクトメッセージ</h1>
		<section class="p-form">

		@foreach($messages as $message)
			<div class="u-flex u-mb_m">
				<?php /*メッセージの送信・受信ユーザーの分岐*/ ?>
				@if($message -> to_user_id === $user)
				<a href="/profile/{{$message -> from_user_id}}">
				<div class="p-message__pic c-img__msg">
					<img src="{{$message -> fromUser -> pic}}" class="c-img">
				</div>
				</a>
				<div class="p-message--right c-textbox">
					<span>{{$message -> comment}}</span><br>
					<?php /*タイムゾーンの変更*/ ?>
					<span class="c-date">{{$message -> updated_at -> timezone("JST") ->format('Y/m/d H:i')}}</span>
				</div>
				@else
				<div class="p-message--left c-textbox">
					<span>{{$message -> comment}}</span><br>
					<?php /*タイムゾーンの変更*/ ?>
					<span class="c-date">{{$message -> updated_at -> timezone("JST") ->format('Y/m/d H:i')}}</span>
				</div>
				<a href="/profile/{{$message -> from_user_id}}">
				<div class="p-message__pic c-img__msg">
					<img src="{{$message -> fromUser -> pic}}" class="c-img">
				</div>
				</a>
				@endif
			</div>
			@endforeach

			<form action='/message/{{$bord -> id}}' method='post'>
				{{ csrf_field() }}
				<h1 class="c-title u-center u-mb_m">メッセージ送信</h1>
				<div class="p-form__content">
					<textarea class="c-textarea" name="comment" rows="5"></textarea>
					<input type="submit" name="submit" value="送信" class="c-form__button">
				</div>
			</form>
		</section>
	</article>
</main>

@endsection
