@extends('layouts.template')

@section('title', 'お気に入り一覧')
@section('description', 'エンジニアのマッチングサイト「match!」のお気に入り一覧ページです。案件の依頼や応募、プロジェクトへの参加を簡単に、気軽に行えるようにする「エンジニアのマッチングサイト」です。')
@section('keyword', 'match, 案件, エンジニア, マッチング, 気軽')
@include('layouts.head')

@section('contents')

<main class="main u-flex">

	@component('components.maincontent')
	@slot('title')
	お気に入り一覧
	@endslot
    <section>
			<div class="p-panel">
				<?php /*お気に入り案件の展開*/ ?>
				@foreach($likes as $like)
				<div class="p-panel__item  u-mb_m">
					<a href="detail/{{$like -> project -> id}}" class="c-textbox u-ellipsis__default">{{$like -> project -> title}}</a>
				</div>
				@endforeach
			</div>
    </section>

	@endcomponent

  @component('components.mymenu')
  @endcomponent

</main>

@endsection
