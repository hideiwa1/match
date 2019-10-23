@extends('layouts.template')

@section('title', 'message')
@include('layouts.head')

@section('contents')

<main class="main">

	<article class="u-mb_l">
		<h1 class="c-title u-center u-mb_m">
			@if($bord -> from_user_id === $user)
			{{$bord -> toUser -> name}}
			@else
			{{$bord -> fromUser -> name}}
			@endif
			さんとのダイレクトメッセージ</h1>
		<section class="p-form">

		@foreach($messages as $message)
			<div class="u-flex u-mb_m">
				@if($message -> to_user_id === $user)
				<div class="p-message__pic">
					<img src="" class="c-img">
				</div>
				<div class="p-message--right c-textbox">
					<span>{{$message -> comment}}</span><br>
					<span class="c-date">{{$message -> updated_at ->format('Y/m/d H:i')}}</span>
				</div>
				@else
				<div class="p-message--left c-textbox">
					<span>{{$message -> comment}}</span><br>
					<span class="c-date">{{$message -> updated_at ->format('Y/m/d H:i')}}</span>
				</div>
				<div class="p-message__pic">
					<img src="" class="c-img">
				</div>
				@endif
			</div>
			@endforeach

			<div class="u-flex u-mb_m">
				<div class="p-message--left c-textbox">
					<span>コメント内容</span><br>
					<span class="c-date">投稿日時</span>
				</div>
				<div class="p-message__pic">
					<img src="" class="c-img">
				</div>
			</div>

			<form action='/message/{{$bord -> id}}' method='post'>
				{{ csrf_field() }}
				<h1 class="c-title u-center u-mb_m">メッセージ送信</h1>
				<div class="p-form__content">
					<textarea class="c-textarea" name="comment"></textarea>
					<input type="submit" name="submit" value="送信" class="c-formbutton">
				</div>
			</form>
		</section>
	</article>
</main>

@endsection
