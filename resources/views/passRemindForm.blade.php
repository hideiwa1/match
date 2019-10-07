@extends('layouts.template')

@section('title', 'myComment')
@include('layouts.head')

@section('contents')

<main class="main">
  <form class="p-form">
    <h1 class="c-title u-center u-mb_xl">認証キー入力</h1>
    <div class="p-form__content">
      <p>
        メール本文中の【認証キー】を入力してください。
      </p>
      <p class="u-mb_xl">
        <span class="c-formtitle">認証キー</span>
        <input type="text" name="onepass" placeholder="認証キー" class="c-textform">
      </p>
      <input type="submit" name="submit" value="送信" class="c-formbutton">
    </div>
  </form>
</main>

@endsection
