@extends('layouts.template')

@section('title', 'お気に入り一覧')
@include('layouts.head')

@section('contents')

<main class="main u-flex">

	@component('components.maincontent')
	@slot('title')
	お気に入り一覧
	@endslot
    <section>
			<div class="p-panel">
				@foreach($likes as $like)
				<div class="p-panel__item">
					<a href="detail/{{$like -> project -> id}}" class="c-textbox u-mb_m">{{$like -> project -> title}}</a>
				</div>
				@endforeach
			</div>
    </section>

	@endcomponent

  @component('components.mymenu')
  @endcomponent

</main>

@endsection
