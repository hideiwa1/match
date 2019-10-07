@extends('layouts.template')

@section('title', 'myComment')
@include('layouts.head')

@section('contents')

<main class="main u-flex">

  <aside class="p-sidecontent">
    <h1 class="c-title">案件検索</h1>
    <form>
      <div class="p-form__content">
        <p>
          <span class="c-formtitle">キーワード</span>
          <input type="text" name="keyword" placeholder="キーワード" class="c-textform">
        </p>
        <p>
          <input type="checkbox" name="category" value="single">単発案件<br>
          <input type="checkbox" name="category" value="share">レベニューシェア案件
        </p>
        <p>
          <span class="c-formtitle">金額</span>
          <input type="number" name="min" class="c-numform">千〜
          <input type="number" name="max" class="c-numform">千
        </p>
        <input type="submit" name="submit" value="検索" class="c-formbutton">
      </div>
    </form>
  </aside>

  <article class="p-maincontent u-pl_l">
    <h1 class="c-title">案件一覧</h1>
    <div class="p-panel">
      <div class="p-panel__item u-mb_m">
        <a href="ditale.html" class="c-textbox">
          <span>タイトル</span><br>
          <span>単発案件</span><br>
          <span>金額：10万〜20万</span>
        </a>
      </div>
      <div class="p-panel__item u-mb_m">
        <a href="ditale.html" class="c-textbox">
          <span>タイトル</span><br>
          <span>単発案件</span><br>
          <span>金額：10万〜20万</span>
        </a>
      </div>
      <div class="p-panel__item u-mb_m">
        <a href="ditale.html" class="c-textbox">
          <span>タイトル</span><br>
          <span>単発案件</span><br>
          <span>金額：10万〜20万</span>
        </a>
      </div>
      <div class="p-panel__item u-mb_m">
        <a href="ditale.html" class="c-textbox">
          <span>単発案件</span><br>
          <span>タイトル</span><br>
          <span>金額：10万〜20万</span>
        </a>
      </div>
      <div class="p-panel__item u-mb_m">
        <a href="ditale.html" class="c-textbox">
          <span>タイトル</span><br>
          <span>単発案件</span><br>
          <span>金額：10万〜20万</span>
        </a>
      </div>
    </div>
    <div>
      <ul class="u-flex p-pagenation u-center">
        <li class="pagenation__item active">1</li>
        <li class="pagenation__item">2</li>
        <li class="pagenation__item">3</li>
        <li class="pagenation__item">4</li>
        <li class="pagenation__item">&gt;</li>
      </ul>
    </div>
  </article>
</main>

@endsection
