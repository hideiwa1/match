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
			{{ csrf_field() }}
			<div class="p-form__content">
				<p class="u-mb_m">
					<span class="c-form__title">タイトル</span>
					<input type="text" name="title" placeholder="title" class="c-form__text" value="{{$data ? $data->title : old('title')}}">
				</p>
				<p class="u-mb_m">
					<span class="c-form__title">案件種別</span>
					<input type="radio" name="category_id" value="1" {{$data ? ($data -> category_id == "1" ? "checked" : '') : (old('category_id') == "1" ? "checked" : '')}} >単発案件
					<input type="radio" name="category_id" value="2" {{$data ? ($data -> category_id == "2" ? "checked" : '') : (old('category_id') == "2" ? "checked" : '')}}>レベニューシェア案件
				</p>
				<p class="u-mb_m">
					<span class="c-form__title">予算（最低金額〜最高金額）</span>
					<input type="number" name="min_price" class="c-form__num" value="{{$data ? $data->min_price : old('min_price')}}">,000円〜
					<input type="number" name="max_price" class="c-form__num" value="{{$data ? $data->max_price : old('max_price')}}">,000円
				</p>
				<p class="u-mb_m">
					<span class="c-form__title">案件概要</span>
					<textarea name="comment" class="c-textarea" rows="5">{{$data ? $data->comment : old('comment')}}</textarea>
				</p>
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
