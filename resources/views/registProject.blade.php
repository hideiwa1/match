@extends('layouts.template')

@section('title', '案件登録')
@section('description', 'エンジニアのマッチングサイト「match!」の案件登録ページです。案件の依頼や応募、プロジェクトへの参加を簡単に、気軽に行えるようにする「エンジニアのマッチングサイト」です。')
@section('keyword', 'match, 案件, エンジニア, マッチング, 気軽')
@include('layouts.head')

@section('contents')

<main class="main">
  <section class="p-form u-mb_l">
    <h1 class="c-title u-center u-mb_m">{{$title}}</h1>
		<?php /*バリデーションの表示*/ ?>
		@foreach ($errors -> all() as $error)
		<p class="u-error">{{ $error }}</p>
		@endforeach
		<form action="/registProject/{{$id}}" method="post">
		<div></div>
			{{ csrf_field() }}
			<div class="p-form__content">
				<div id="js-registProject"></div>
				<?php /*新規登録、編集の分岐*/ ?>
				@if($id === "new")
				<input type="submit" value="新規登録" class="c-form__button">
				@else
				<input type="submit" value="更新" class="c-form__button">
				@endif
			</div>
		</form>
  </section>
</main>

@endsection
