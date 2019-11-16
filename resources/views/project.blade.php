@extends('layouts.template')

@section('title', '案件検索')
@section('description', 'エンジニアのマッチングサイト「match!」の案件検索ページです。案件の依頼や応募、プロジェクトへの参加を簡単に、気軽に行えるようにする「エンジニアのマッチングサイト」です。')
@section('keyword', 'match, 案件, エンジニア, マッチング, 気軽')
@include('layouts.head')

@section('contents')

<main class="main u-flex">

  <aside class="p-searchcontent u-mb_l u-pl_l">
    <h1 class="c-title">案件検索</h1>
		<div id="js-search"></div>
  </aside>

  <article class="p-maincontent u-pl_l">
    <h1 class="c-title">案件一覧</h1>
			<div id="js-project"></div>
  </article>
</main>

@endsection
