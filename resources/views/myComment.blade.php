@extends('layouts.template')

@section('title', 'コメント一覧')
@include('layouts.head')

@section('contents')

<main class="main u-flex">

  @component('components.maincontent')
    @slot('title')
    コメント一覧
    @endslot
	<section>
		<div class="p-panel">
		@foreach($comments as $comment)
			<div class="p-panel__item u-mb_m">
				<a href="detail/{{$comment -> project_id}}" class="c-textbox u-ellipsis__default">{{$comment -> comment}}</a>
			</div>
			@endforeach
		</div>
	</section>
  @endcomponent

@component('components.mymenu')
@endcomponent

</main>

@endsection
