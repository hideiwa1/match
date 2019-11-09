@extends('layouts.template')

@section('title', 'パスワード再発行')
@include('layouts.head')

@section('contents')

<main class="main">

    <form method="post" action="{{ route('password.email') }}" class="p-form">
        {{ csrf_field() }}
        <h1 class="c-title u-center u-mb_xl">パスワード再発行</h1>
        <div class="p-form__content">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <p>
                ご登録のメールアドレスを入力してください。
            </p>
            <p class="u-mb_xl">
                <span class="c-form__title" value="{{ old('email') }}">Email</span>
                <input type="text" name="email" placeholder="email" class="c-form__text">
            </p>
            <input type="submit" name="submit" value="送信" class="c-form__button">
        </div>
    </form>
</main>

@endsection