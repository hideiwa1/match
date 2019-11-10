@extends('layouts.template')

@section('title', 'ダイレクトメッセージ一覧')
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
			<div class="p-panel__item u-mb_m">
				<p>
				@if($msg -> from_user_id === $user)
					@if($msg -> toUser -> name)
						{{$msg -> toUser -> name}}
					@else
						名無し
					@endif
				@else
					@if($msg -> fromUser -> name)
						{{$msg -> fromUser -> name}}
					@else
						名無し
					@endif
				@endif
					さんとのダイレクトメッセージ</p>
				<p><a href="message/{{$msg -> bord_id}}" class="c-textbox u-ellipsis__default">{{$msg -> comment}}</a></p>
			</div>
			@endforeach
		</div>
	</section>
	@endcomponent

	@component('components.mymenu')
	@endcomponent

</main>

@endsection
