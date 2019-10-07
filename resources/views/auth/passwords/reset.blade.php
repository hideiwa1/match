@extends('layouts.template')

@section('title', 'myComment')
@include('layouts.head')

@section('contents')

<main class="main">

    <form method="post" action="{{ route('password.update') }}" class="p-form">
        {{ csrf_field() }}
        <input type="hidden" name="token" value="{{ $token }}">
        <h1 class="c-title u-center u-mb_xl">パスワード再設定</h1>
        @foreach ($errors -> all() as $error)
        <p>{{ $error }}</p>
        @endforeach
        <div class="p-form__content">
            <p>
                新しいパスワードを入力してください
            </p>
            <p>
                <span class="c-formtitle" value="{{ old('email') }}">Email</span>
                <input type="text" name="email" placeholder="email" class="c-textform">
            </p>
            <p>
                <span class="c-formtitle">Password</span>
                <input type="password" name="password" placeholder="password" class="c-textform">
            </p>
            <p class="u-mb_xl">
                <span class="c-formtitle">Password再入力</span>
                <input type="password" name="password_confirmation" placeholder="再入力" class="c-textform">
            </p>
            <input type="submit" name="submit" value="送信" class="c-formbutton">
        </div>
    </form>
</main>

@endsection

