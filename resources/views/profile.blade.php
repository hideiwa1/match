@extends('layouts.template')

@section('title', 'myComment')
@include('layouts.head')

@section('contents')

<main class="main">

  <article class="p-form">
    
    <section>
			<h1 class="c-title u-center u-mb_m">{{$user -> name}}さんのプロフィール</h1>
			<div class="p-form__content">
        <div class="c-mypic">
          <img src="{{$user -> pic}}" class="c-img">
        </div>
				<div class="u-mb_m">
					<p>
						<sapn class="c-formtitle">ユーザー名
						</sapn>
						<span class="c-formtitle u-pl_l">{{$user -> name}}</span>
						@if($user -> id !== $myId)
						<span class="c-formtitle u-pl_l">
						<a href="/messageCheck/{{$user -> id}}">ダイレクトメッセージを送る</a>
						</span>
						@endif
         </p>
          <p>
						<sapn class="c-formtitle">プロフィール文</sapn>
						<sapn class="c-formtitle u-pl_l">{{$user -> comment}}</sapn>
       </p>
        </div>
        <h2>提案中の案件</h2>
      <div class="p-panel">
       @foreach($projects as $project)
        <div class="p-panel__item">
          <a href="/detail/{{$project -> id}}" class="c-textbox u-mb_m">
						<p>{{$project -> title}}</p>
						予算：{{$project -> min_price}}千〜{{$project -> max_price}}千
					</a>
        </div>
        @endforeach
      </div>
			</div>
    </section>

  </article>

</main>

@endsection
