@extends('layouts.template')

@section('title', '案件検索')
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
