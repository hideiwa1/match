@extends('layouts.template')

@section('title', 'myComment')
@include('layouts.head')

@section('contents')

<main class="main">
  <section class="p-form u-mb_l">
    <h1 class="c-title u-center u-mb_m">{{$title}}</h1>
		@foreach ($errors -> all() as $error)
		<p>{{ $error }}</p>
		@endforeach
		<form action="/registProject/{{$id}}" method="post">
			{{ csrf_field() }}
			<div class="p-form__content">
				<p class="u-mb_m">
					<span class="c-formtitle">タイトル</span>
					<input type="text" name="title" placeholder="title" class="c-textform" value="{{$data ? $data->title : old('title')}}">
				</p>
				<p class="u-mb_m">
					<span class="c-formtitle">案件種別</span>
					<input type="radio" name="category_id" value="1" {{$data ? ($data -> category_id == "1" ? "checked" : '') : (old('category_id') == "1" ? "checked" : '')}} >単発案件
					<input type="radio" name="category_id" value="2" {{$data ? ($data -> category_id == "2" ? "checked" : '') : (old('category_id') == "2" ? "checked" : '')}}>レベニューシェア案件
				</p>
				<p class="u-mb_m">
					<span class="c-formtitle">予算</span>
					<input type="number" name="min_price" class="c-numform" value="{{$data ? $data->min_price : old('min_price')}}">千〜
					<input type="number" name="max_price" class="c-numform" value="{{$data ? $data->max_price : old('max_price')}}">千
				</p>
				<p class="u-mb_m">
					<span class="c-formtitle">案件概要</span>
					<textarea name="comment" class="c-textarea" rows="5">{{$data ? $data->comment : old('comment')}}</textarea>
				</p>
				@if($id === "new")
				<input type="submit" value="新規登録" class="c-formbutton">
				@else
				<input type="submit" value="更新" class="c-formbutton">
				@endif
			</div>
		</form>
  </section>
</main>

@endsection
