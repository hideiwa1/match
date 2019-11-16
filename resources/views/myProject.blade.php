@extends('layouts.template')

@section('title', '登録案件一覧')
@section('description', 'エンジニアのマッチングサイト「match!」の登録案件一覧ページです。案件の依頼や応募、プロジェクトへの参加を簡単に、気軽に行えるようにする「エンジニアのマッチングサイト」です。')
@section('keyword', 'match, 案件, エンジニア, マッチング, 気軽')
@include('layouts.head')

@section('contents')

<main class="main u-flex">

  <article class="p-maincontent">
    <h1 class="c-title">登録案件一覧</h1>
    <section>
      <div class="p-panel">
				<?php /*登録案件の展開*/ ?>
       @foreach($projects as $project)
        <div class="p-panel__item u-mb_m">
          <a href="detail/{{$project -> id}}" class="c-textbox u-ellipsis__default">{{$project -> title}}</a>
        </div>
        @endforeach
      </div>
    </section>

  </article>

  @component('components.mymenu')
  @endcomponent

</main>

@endsection
