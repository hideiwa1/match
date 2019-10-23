@extends('layouts.template')

@section('title', 'myComment')
@include('layouts.head')

@section('contents')

<main class="main u-flex">
	{{ csrf_field() }}

  <article class="p-maincontent">
    <h1 class="c-title">マイページ</h1>
    <section>
      <h2>登録案件</h2>
      <div class="p-panel u-flex">
				@foreach ($projects as $project)
        <div class="p-panel__item5">
         
          <a href="detail/{{$project -> id}}" class="c-textbox u-mb_m">{{$project -> title}}</a>
         
        </div>
				@endforeach
        
      </div>
      <p class="u-right"><a href="myProject">>>さらに見る</a></p>
    </section>

		<section>
			<h2>お気に入り案件</h2>
			<div class="p-panel u-flex">
				@foreach ($likes as $like)
				<div class="p-panel__item5">

					<a href="detail/{{$like -> project -> id}}" class="c-textbox u-mb_m">{{$like -> project -> title}}</a>

				</div>
				@endforeach

			</div>
			<p class="u-right"><a href="myLike">>>さらに見る</a></p>
		</section>
   
    <section>
      <h2>メッセージ一覧</h2>
      <div class="p-panel">
        <div class="p-panel__item">
          <a href="ditale.html" class="c-textbox u-mb_m">案件詳細</a>
        </div>
        <div class="p-panel__item">
          <a href="ditale.html" class="c-textbox u-mb_m">案件詳細</a>
        </div>
        <div class="p-panel__item">
          <a href="ditale.html" class="c-textbox u-mb_m">案件詳細</a>
        </div>
      </div>
      <p class="u-right"><a href="project.html">>>さらに見る</a></p>
    </section>

    <section>
      <h2>ダイレクトメッセージ一覧</h2>
      <div class="p-panel">
        <div class="p-panel__item">
          <a href="ditale.html" class="c-textbox u-mb_m">案件詳細</a>
        </div>
        <div class="p-panel__item">
          <a href="ditale.html" class="c-textbox u-mb_m">案件詳細</a>
        </div>
        <div class="p-panel__item">
          <a href="ditale.html" class="c-textbox u-mb_m">案件詳細</a>
        </div>
      </div>
      <p class="u-right"><a href="project.html">>>さらに見る</a></p>
    </section>
  </article>

  @component('components.mymenu')
  @endcomponent

</main>

@endsection
