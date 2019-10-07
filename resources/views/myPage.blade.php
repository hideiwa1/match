@extends('layouts.template')

@section('title', 'myComment')
@include('layouts.head')

@section('contents')

<main class="main u-flex">

  <article class="p-maincontent">
    <h1 class="c-title">マイページ{{ $msg }}</h1>
    <section>
      <h2>登録案件</h2>
      <div class="p-panel u-flex">
        <div class="p-panel__item5">
          <a href="detail.html" class="c-textbox u-mb_m">案件詳細</a>
        </div>
        <div class="p-panel__item5">
          <a href="ditale.html" class="c-textbox u-mb_m">案件詳細</a>
        </div>
        <div class="p-panel__item5">
          <a href="ditale.html" class="c-textbox u-mb_m">案件詳細</a>
        </div>
        <div class="p-panel__item5">
          <a href="ditale.html" class="c-textbox u-mb_m">案件詳細</a>
        </div>
        <div class="p-panel__item5">
          <a href="ditale.html" class="c-textbox u-mb_m">案件詳細</a>
        </div>
      </div>
      <p class="u-right"><a href="project.html">>>さらに見る</a></p>
    </section>

    <section>
      <h2>メッセージ一覧</h2>
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

    <section>
      <h2>ダイレクトメッセージ一覧</h2>
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

  @component('components.mymenu')
  @endcomponent

</main>

@endsection
