@extends('layouts.template')

@section('title', 'プロフィール')
@include('layouts.head')

@section('contents')

<main class="main">

  <article class="p-form">
    
    <section>
			<h1 class="c-title u-center u-mb_m">{{$user -> name}}さんのプロフィール</h1>
			<div class="p-form__content">
        <div class="c-img__profile">
          <img src="{{$user -> pic}}" class="c-img">
        </div>
				<div class="u-mb_m">
					<p>
						<sapn class="c-form__title">ユーザー名
						</sapn>
						<span class="c-form__title u-pl_l">{{$user -> name}}</span>
						@if($user -> id !== $myId)
						<span class="c-form__title u-pl_l">
						<a href="/messageCheck/{{$user -> id}}">ダイレクトメッセージを送る</a>
						</span>
						@endif
         </p>
          <p>
						<sapn class="c-form__title">プロフィール文</sapn>
						<sapn class="c-form__title u-pl_l">{{$user -> comment}}</sapn>
       </p>
        </div>
        <h2>提案中の案件</h2>
      <div class="p-panel">
       @foreach($projects as $project)
				<div class="p-comment u-mb_m">
          <a href="/detail/{{$project -> id}}" class="c-textbox">
						<p class="u-ellipsis__default">{{$project -> title}}</p>
						{{$project -> category -> name }}<br>
						@if($project -> category_id === 1)
						予算：{{$project -> min_price}},000円〜{{$project -> max_price}},000円
						@endif
					</a>
        </div>
        @endforeach
      </div>
			</div>
    </section>

  </article>

</main>

@endsection
