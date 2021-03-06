@extends('layouts.template')

@section('title', '案件詳細')
@section('description', 'エンジニアのマッチングサイト「match!」の案件詳細ページです。予算'.($detail -> min).',000円〜の案件情報です。'.($detail -> title))
@section('keyword', 'match, 案件, エンジニア, マッチング, 気軽')
@include('layouts.head')

@section('contents')

<main class="main">

	<article class="p-form u-mb_l">
		<h1 class="c-title u-center u-mb_m u-word">{{$detail -> title}}</h1>
		<div class="u-flex-between u-lineheight">
			<div class="twitter u-inline u-vertical">
				<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-text="" data-show-count="false" data-lang="ja">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
			</div>
			<div id="js-like" class="c-like"></div>
		</div>

		<table>
			<tr>
				<td class="c-th">発注者</td>
				<td>
				<a href="/profile/{{$detail -> user_id}}">
					<?php /*ユーザー名の表示*/ ?>
				@if($detail -> user -> name)
					{{$detail -> user -> name}}
					@else
					名無し
					@endif
					</a><br>
					</td>
			</tr>
			<tr>
				<td class="c-th">案件種別</td>
				<td>{{$detail -> category -> name }}</td>
			</tr>
			@if($detail -> category_id === 1)
			<tr>
				<td class="c-th">予算</td>
				<td>{{$detail -> min_price}},000円〜{{$detail -> max_price}},000円</td>
			</tr>
			@endif
			<tr>
				<td class="c-th">説明文</td>
				<td class="u-word">{{$detail -> comment}}</td>
			</tr>
		</table>
		<form action="/detail/{{$detail -> id }}" method="post" class="u-mb_m">
			{{ csrf_field() }}
			<?php /* 作成者、未応募、応募済みの分岐 */ ?>
		@if($detail -> user_id === $user)
			<input type="submit" name="edit" value="編集する" class="c-form__button u-mb_m">
			<h2 class="c-title u-center u-mb_m">応募者一覧</h2>
			@foreach($attenders as $attender)
			<p>
			<a href="/profile/{{$attender -> user_id}}">
				<?php /*ユーザー名の表示*/ ?>
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
			<a href="/messageCheck/{{$detail -> user -> id}}">
			<div class="c-form__button u-mb_m u-center">
			応募済みです<br>
				ダイレクトメッセージを送る
			</div>
			</a>
			@else
			<input type="submit" name="comit"
value="応募する" class="c-form__button u-mb_m">
			@endif
		@else
			応募するにはログインが必要です
			<button class="c-form__button u-mb_m"><a href="/login">ログイン</a></button>
		@endif
		</form>

		<section>
			<h1 class="c-title u-center u-mb_m">質問・コメント</h1>
			<?php /*コメントの展開*/ ?>
			@foreach($comments as $comment)
			<div class="p-comment u-mb_m">
				<?php /*通し番号*/ ?>
				<div class="p-comment__no">No.{{$loop -> iteration}}</div>
				<div class="p-comment__text">
					<span class="u-word">{{$comment -> comment}}</span><br>
					<span class="c-date">
						<a href="/profile/{{$comment -> user_id}}">
							<?php /*ユーザー名の表示*/ ?>
					@if($comment -> user -> name)
						{{$comment -> user -> name}}
					@else
						名無し
					@endif
						</a>
						<?php /*タイムゾーンの変更*/ ?>
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
					<input type="submit" value="送信" class="c-form__button">
					@else
					コメントするにはログインが必要です
					<button class="c-form__button"><a href="/login">ログイン</a></button>
					@endif
				</div>
			</form>
		</section>
	</article>

</main>

@endsection
