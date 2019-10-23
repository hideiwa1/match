@extends('layouts.template')

@section('title', 'myComment')
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
			<div class="p-panel__item">
				<a href="detail/{{$comment -> project_id}}" class="c-textbox u-mb_m">{{$comment -> comment}}</a>
			</div>
			@endforeach
		</div>
	</section>
  @endcomponent

@component('components.mymenu')
@endcomponent

</main>

@endsection
