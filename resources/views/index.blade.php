@extends('layouts.template')

@section('title', 'index')
@section('description', '仕事の受注をシンプルに！「match!」は、案件の依頼や応募、プロジェクトへの参加を簡単に、気軽に行えるようにする「エンジニアのマッチングサイト」です。')
@section('keyword', 'match, 案件, エンジニア, マッチング, 気軽')
@include('layouts.head')



@section('contents')

@component('components.hero')
@endcomponent
<main class="main">
	<article>
		<h1 class="c-title">新着案件</h1>
		<div class="p-panel u-flex-default">
			<?php /*プロジェクトの展開*/ ?>
			@foreach($projects as $project)
			<div class="p-panel__item5 u-mb_m">
				<a href="detail/{{$project -> id}}" class="c-textbox">
					<p class=" c-textbox u-ellipsis u-height__3line">{{$project -> title}}</p>
						{{$project -> category -> name }}<br>
					@if($project -> category_id === 1)
					<span class="u-toggle">予算：</span>
					{{$project -> min_price}},000円〜
					{{$project -> max_price}},000円
					@endif
				</a>
			</div>
			@endforeach
		</div>
		<p class="u-right"><a href="project">>>さらに見る</a></p>
	</article>

	<article>
		<h1 class="c-title">利用方法</h1>
		<div class="p-panel u-flex">
			<div class="p-panel__item3 u-mb_m">
				<div class="c-textbox">
					<p class="u-center">STEP1</p>
					ユーザー登録をお願いします。<br>
					入力項目は「メールアドレス」「パスワード」の２項目のみ！
				</div>
			</div>
			<div class="p-panel__item3 u-mb_m">
				<div class="c-textbox">
					<p class="u-center">STEP2</p>
					案件を依頼したい人<br>
					案件の概要、予算などを入力！<br>
					案件に応募したい人<br>
					案件一覧より、興味のあるものに「応募」するだけ！
				</div>
			</div>
			<div class="p-panel__item3 u-mb_m">
				<div class="c-textbox">
					<p class="u-center">STEP3</p>
					相手が決まったら、直接メッセージで打ち合わせ！
				</div>
			</div>
		</div>
	</article>

</main>

@endsection
