@extends('layouts.template')

@section('title', 'index')
@include('layouts.head')



@section('contents')

@component('components.hero')
@endcomponent
<main class="main">
  <article>
    <h1 class="c-title">新着案件</h1>
    <div class="p-panel u-flex">
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
      <div class="p-panel__item5">
        <a href="ditale.html" class="c-textbox u-mb_m">案件詳細</a>
      </div>
    </div>
    <p class="u-right"><a href="project.html">>>さらに見る</a></p>
  </article>

  <article>
    <h1 class="c-title">利用方法</h1>
    <div class="p-panel u-flex">
      <div class="p-panel__item3 c-textbox u-mb_m">
        <p class="u-center">STEP1</p>
        ユーザー登録をお願いします。<br>
        入力項目は「メールアドレス」「パスワード」の２項目のみ！
      </div>
      <div class="p-panel__item3 c-textbox u-mb_m">
        <p class="u-center">STEP2</p>
        案件を依頼したい人<br>
        案件の概要、予算などを入力！<br>
        案件に応募したい人<br>
        案件一覧より、興味のあるものに「応募」するだけ！
      </div>
      <div class="p-panel__item3 c-textbox u-mb_m">
        <p class="u-center">STEP3</p>
        相手が決まったら、直接メッセージで打ち合わせ！
      </div>
    </div>
  </article>

</main>

@endsection
