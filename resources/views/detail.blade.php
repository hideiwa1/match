@extends('layouts.template')

@section('title', 'myComment')
@include('layouts.head')

@section('contents')

<main class="main">

	<article class="p-form u-mb_l">
		<h1 class="c-title u-center u-mb_m">{{$detail -> title}}</h1>
		<div class="twitter">
		<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-text="" data-show-count="false" data-lang="ja">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
		</div>
		<div id="js-like" class="u-right"></div>
		<table>
			<tr>
				<td class="c-th">発注者</td>
				<td>@if($detail -> user -> name)
					{{$detail -> user -> name}}
					@else
					名無し
					@endif<br>
					<a href="/messageCheck/{{$detail -> user -> id}}">ダイレクトメッセージを送る</a></td>
			</tr>
			<tr>
				<td class="c-th">案件種別</td>
				<td>{{$detail -> category -> name }}</td>
			</tr>
			<tr>
				<td class="c-th">予算</td>
				<td>{{$detail -> min_price}}万〜{{$detail -> max_price}}万</td>
			</tr>
			<tr>
				<td class="c-th">説明文</td>
				<td>{{$detail -> comment}}</td>
			</tr>
		</table>
		<form action="/detail/{{$detail -> id }}" method="post">
			{{ csrf_field() }}
		@if($detail -> user_id === $user)
			<input type="submit" name="edit" value="編集する" class="c-formbutton u-mb_m">
			<h2>応募者一覧</h2>
			@foreach($attenders as $attender)
			<p>@if($attender -> user -> name)
				{{$attender -> user -> name}}
				@else
				名無し
				@endif
			</p>
			@endforeach
		@elseif(Auth::check())
		<input type="submit" name="comit"
					 value="応募する" class="c-formbutton u-mb_m">
			@else
			<button class="c-formbutton"><a href="login">応募するにはログインが必要です</a></button>
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
					@if($comment -> user -> name)
						{{$comment -> user -> name}}
					@else
						名無し
					@endif
					　　{{$comment -> created_at->format('Y/m/d H:i')}}</span>
				</div>
			</div>
			@endforeach
			
			<form action="/detail/{{$detail -> id }}" method="post">
				{{ csrf_field() }}
				<h1 class="c-title u-center u-mb_m">コメント投稿</h1>
				<div class="p-form__content">
					@if(Auth::check())
					<textarea class="c-textarea" name="comment"></textarea>
					<input type="submit" value="送信" class="c-formbutton">
					@else
					<button class="c-formbutton"><a href="login">コメントするにはログインが必要です</a></button>
					@endif
				</div>
			</form>
		</section>
	</article>

</main>

@endsection
