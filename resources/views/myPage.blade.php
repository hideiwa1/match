@extends('layouts.template')

@section('title', 'マイページ')
@include('layouts.head')

@section('contents')

<main class="main u-flex">
	{{ csrf_field() }}

  <article class="p-maincontent">
    <h1 class="c-title">マイページ</h1>
    <section>
      <h2>登録案件</h2>
      <div class="p-panel u-flex-default">
				@foreach ($projects as $project)
				<div class="p-panel__item5 u-mb_m u-height__3line">
         
          <a href="/detail/{{$project -> id}}" class="c-textbox u-ellipsis">{{$project -> title}}</a>
         
        </div>
				@endforeach
        
      </div>
      <p class="u-right"><a href="myProject">>>さらに見る</a></p>
    </section>

		<section>
			<h2>お気に入り案件</h2>
			<div class="p-panel u-flex-default">
				@foreach ($likes as $like)
				<div class="p-panel__item5 u-mb_m u-height__3line">

					<a href="detail/{{$like -> project -> id}}" class="c-textbox u-ellipsis">{{Str::limit($like -> project -> title, 20, '...')}}</a>

				</div>
				@endforeach

			</div>
			<p class="u-right"><a href="myLike">>>さらに見る</a></p>
		</section>
   
    <section>
      <h2>メッセージ一覧</h2>
      <div class="p-panel">
       
				@foreach ($comments as $comment)
				<div class="p-panel__item u-mb_m">
					<a href="detail/{{$comment -> project_id}}" class="c-textbox">
					<p class="u-ellipsis__default">{{$comment -> project -> title}}</p>
					<span class="u-ellipsis__default">{{$comment -> comment}}</span></a>
				</div>
				@endforeach
       
      </div>
      <p class="u-right"><a href="myComment">>>さらに見る</a></p>
    </section>

    <section>
     
      <h2>ダイレクトメッセージ一覧</h2>
      <div class="p-panel">
      @if($messages)
				@foreach ($messages as $message)
				<div class="p-panel__item u-mb_m">
					<a href="message/{{$message -> bord_id}}" class="c-textbox">
						<p class="u-ellipsis__default">
							@if($message -> from_user_id === $user_id)
							{{$message -> toUser -> name}}
							@else
							{{$message -> fromUser -> name}}
							@endif
							さんとのダイレクトメッセージ
						</p>
						<span class="u-ellipsis__default">{{$message -> comment}}</span></a>
				</div>
				@endforeach
      @endif
       
      </div>
      <p class="u-right"><a href="myMessage">>>さらに見る</a></p>
    </section>
  </article>

  @component('components.mymenu')
  @endcomponent

</main>

@endsection
