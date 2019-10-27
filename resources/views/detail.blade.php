@extends('layouts.template')

@section('title', 'myComment')
@include('layouts.head')

@section('contents')

<main class="main">

	<article class="p-form u-mb_l">
		<h1 class="c-title u-center u-mb_m">{{$detail -> title}}</h1>
		<div class="u-flex">
			<div class="twitter u-inline">
				<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-text="" data-show-count="false" data-lang="ja">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
			</div>
			<div id="js-like" class="c-like"></div>
		</div>
		
		<table>
			<tr>
				<td class="c-th">発注者</td>
				<td>
				<a href="/profile/{{$detail -> user_id}}">
				@if($detail -> user -> name)
					{{$detail -> user -> name}}
					@else
					名無し
					@endif
					</a><br>
					@if($detail -> user_id !== $user)
					<a href="/messageCheck/{{$detail -> user -> id}}">ダイレクトメッセージを送る</a>
					@endif
					</td>
			</tr>
			<tr>
				<td class="c-th">案件種別</td>
				<td>{{$detail -> category -> name }}</td>
			</tr>
			<tr>
				<td class="c-th">予算</td>
				<td>{{$detail -> min_price}}千〜{{$detail -> max_price}}千</td>
			</tr>
			<tr>
				<td class="c-th">説明文</td>
				<td>{{$detail -> comment}}</td>
			</tr>
		</table>
		<form action="/detail/{{$detail -> id }}" method="post" class="u-mb_m">
			{{ csrf_field() }}
		@if($detail -> user_id === $user)
			<input type="submit" name="edit" value="編集する" class="c-formbutton u-mb_m">
			<h2 class="c-title u-center u-mb_m">応募者一覧</h2>
			@foreach($attenders as $attender)
			<p>
			<a href="/profile/{{$attender -> user_id}}">
			@if($attender -> user -> name)
				{{$attender -> user -> name}}
				@else
				名無し
				@endif
			</a>
			</p>
			@endforeach
		@elseif(Auth::check())
			@if($attendFlg)
			<div class="c-formbutton u-mb_m u-center">
			応募済みです
			</div>
			@else
			<input type="submit" name="comit"
value="応募する" class="c-formbutton u-mb_m">
			@endif
		@else
			応募するにはログインが必要です
			<button class="c-formbutton u-mb_m"><a href="login">ログイン</a></button>
		@endif
		</form>

		<section>
			<h1 class="c-title u-center u-mb_m">質問・コメント</h1>
			@foreach($comments as $comment)
			<div class="p-comment u-mb_m">
				<div class="p-comment__no">No.1</div>
				<div class="p-comment__text">
					<span>{{$comment -> comment}}</span><br>
					<span class="c-date">
						<a href="/profile/{{$comment -> user_id}}">
					@if($comment -> user -> name)
						{{$comment -> user -> name}}
					@else
						名無し
					@endif
						</a>
						{{$comment -> created_at-> timezone("JST") ->format('Y/m/d H:i')}}</span>
				</div>
			</div>
			@endforeach
			
			<form action="/detail/{{$detail -> id }}" method="post">
				{{ csrf_field() }}
				<h1 class="c-title u-center u-mb_m">コメント投稿</h1>
				<div class="p-form__content">
					@if(Auth::check())
					<textarea class="c-textarea" name="comment" rows="5"></textarea>
					<input type="submit" value="送信" class="c-formbutton">
					@else
					コメントするにはログインが必要です
					<button class="c-formbutton"><a href="login">ログイン</a></button>
					@endif
				</div>
			</form>
		</section>
	</article>

</main>

@endsection
