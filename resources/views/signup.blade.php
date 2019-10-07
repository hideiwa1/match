@extends('layouts.template')

@section('title', 'myComment')
@include('layouts.head')

@section('contents')

<main class="main">
  <form class="p-form" action="/signup" method="post">
    {{ csrf_field() }}
    <h1 class="c-title u-center u-mb_xl">新規登録</h1>
    @foreach ($errors -> all() as $error)
      <p>{{ $error }}</p>
    @endforeach
    <div class="p-form__content">
      <p>
        <span class="c-formtitle">Email</span>
          <input type="text" name="email" placeholder="email" class="c-textform"  value="{{ old('email') }}">
      </p>
      <p>
        <span class="c-formtitle">Password</span>
        <input type="password" name="password" placeholder="password" class="c-textform">
      </p>
      <p class="u-mb_xl">
        <span class="c-formtitle">Password再入力</span>
        <input type="password" name="password_confirmation" placeholder="再入力" class="c-textform">
      </p>
      <input type="submit" value="新規登録" class="c-formbutton">
    </div>
  </form>
</main>

@endsection
