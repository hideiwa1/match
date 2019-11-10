@extends('layouts.template')

@section('title', '案件登録')
@include('layouts.head')

@section('contents')

<main class="main">
  <section class="p-form u-mb_l">
    <h1 class="c-title u-center u-mb_m">{{$title}}</h1>
		@foreach ($errors -> all() as $error)
		<p class="u-error">{{ $error }}</p>
		@endforeach
		<form action="/registProject/{{$id}}" method="post">
		<div></div>
			{{ csrf_field() }}
			<div class="p-form__content">
				<div id="js-registProject"></div>
				@if($id === "new")
				<input type="submit" value="新規登録" class="c-form__button">
				@else
				<input type="submit" value="更新" class="c-form__button">
				@endif
			</div>
		</form>
  </section>
</main>

@endsection
