@extends('layouts.template')

@section('title', 'myComment')
@include('layouts.head')

@section('contents')

<main class="main">

	<article class="p-form u-mb_l">
		<section>
		<h1 class="c-title u-center u-mb_m">プロフィール編集</h1>
			@foreach ($errors -> all() as $error)
			<p>{{ $error }}</p>
			@endforeach
		<form action="/editProfile" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="p-form__content">

				<div class="u-mb_m">
					<span class="c-formtitle">プロフィール画像</span>
					<div id="js-profpic" class="c-mypic c-formpic">
					</div>
				</div>
				
					<p class="u-mb_m">
						<span class="c-formtitle">ユーザー名</span>
						<input type="text" name="name" placeholder="name" class="c-textform" value="{{old('name') ? old('name') : $data->name}}">
					</p>
					<p class="u-mb_m">
						<span class="c-formtitle">メールアドレス</span>
						<input type="email" name="email" placeholder="email" class="c-textform" value="{{old('email') ? old('email') : $data->email}}">
					</p>
					<p class="u-mb_m">
						<span class="c-formtitle">プロフィール文</span>
						<textarea name="comment" class="c-textarea" rows="5">{{old('comment') ? old('comment') : $data->comment}}</textarea>
					</p>
					<input type="submit" value="登録する" class="c-formbutton">
				

			</div>
			</form>
		</section>

	</article>

</main>

@endsection