@extends('layouts.template')

@section('title', 'myComment')
@include('layouts.head')

@section('contents')

<main class="main">

  <article class="p-form">
    <h1 class="c-title">ユーザーのプロフィール</h1>
    <section>
      <div class="u-table">
        <div class="c-mypic u-tcell">
          <img src="" class="c-img">
        </div>
        <div class="u-tcell">
          <h2>ユーザー名</h2>
          <p>プロフィール文</p>
        </div>
      </div>
      <h2>提案中の案件</h2>
      <div class="p-panel">
        <div class="p-panel__item">
          <a href="ditale.html" class="c-textbox u-mb_m">案件詳細</a>
        </div>
        <div class="p-panel__item">
          <a href="ditale.html" class="c-textbox u-mb_m">案件詳細</a>
        </div>
        <div class="p-panel__item">
          <a href="ditale.html" class="c-textbox u-mb_m">案件詳細</a>
        </div>
      </div>
      <p class="u-right"><a href="project.html">>>さらに見る</a></p>
    </section>

  </article>

</main>

@endsection
