@extends('layouts.template')

@section('title', 'myComment')
@include('layouts.head')

@section('contents')

<main class="main">
  <section class="p-form u-mb_l">
    <h1 class="c-title u-center u-mb_m">新規案件登録</h1>
    <form>
      <div class="p-form__content">
        <p class="u-mb_m">
          <span class="c-formtitle">タイトル</span>
          <input type="text" name="title" placeholder="title" class="c-textform">
        </p>
        <p class="u-mb_m">
          <span class="c-formtitle">案件種別</span>
          <input type="checkbox" name="category" value="single">単発案件
          <input type="checkbox" name="category" value="share">レベニューシェア案件
        </p>
        <p class="u-mb_m">
          <span class="c-formtitle">予算</span>
          <input type="number" name="min" class="c-numform">千〜
          <input type="number" name="max" class="c-numform">千
        </p>
        <p class="u-mb_m">
          <span class="c-formtitle">案件概要</span>
          <textarea name="comment" class="c-textarea"></textarea>
        </p>
        <input type="submit" name="submit" value="新規登録" class="c-formbutton">
      </div>
    </form>
  </section>
</main>

@endsection
