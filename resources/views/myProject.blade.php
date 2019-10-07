@extends('layouts.template')

@section('title', 'myComment')
@include('layouts.head')

@section('contents')

<main class="main u-flex">

  <article class="p-maincontent">
    <h1 class="c-title">お気に入り一覧</h1>
    <section>
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
    </section>

  </article>

  @component('components.mymenu')
  @endcomponent

</main>

@endsection
