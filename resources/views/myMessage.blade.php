@extends('layouts.template')

@section('title', 'myComment')
@include('layouts.head')

@section('contents')

<main class="main u-flex">

	@component('components.maincontent')
	@slot('title')
	ダイレクトメッセージ一覧
	@endslot
	<section>
		<div class="p-panel">
			@foreach($sortedMsgs as $msg)
			<div class="p-panel__item">
				<p>@if($msg -> from_user_id === $user)
					{{$msg -> toUser -> name}}
					@else
					{{$msg -> fromUser -> name}}
					@endif
					さんとのダイレクトメッセージ</p>
				<p><a href="message/{{$msg -> bord_id}}" class="c-textbox u-mb_m">{{$msg -> comment}}</a></p>
			</div>
			@endforeach
		</div>
	</section>
	@endcomponent

	@component('components.mymenu')
	@endcomponent

</main>

@endsection
