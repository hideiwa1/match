@extends('layouts.template')

@section('title', 'コメント一覧')
@section('description', 'エンジニアのマッチングサイト「match!」のコメント一覧ページです。案件の依頼や応募、プロジェクトへの参加を簡単に、気軽に行えるようにする「エンジニアのマッチングサイト」です。')
@section('keyword', 'match, 案件, エンジニア, マッチング, 気軽')
@include('layouts.head')

@section('contents')

<main class="main u-flex">

  @component('components.maincontent')
    @slot('title')
    コメント一覧
    @endslot
	<section>
		<div class="p-panel">
			<?php /*コメントした案件の展開*/ ?>
		@foreach($comments as $comment)
			<div class="p-panel__item u-mb_m">
				<a href="detail/{{$comment -> project_id}}" class="c-textbox u-ellipsis__default">{{$comment -> comment}}</a>
			</div>
			@endforeach
		</div>
	</section>
  @endcomponent

@component('components.mymenu')
@endcomponent

</main>

@endsection
