@extends('layouts.template')

@section('title', '登録案件一覧')
@include('layouts.head')

@section('contents')

<main class="main u-flex">

  <article class="p-maincontent">
    <h1 class="c-title">登録案件一覧</h1>
    <section>
      <div class="p-panel">
       @foreach($projects as $project)
        <div class="p-panel__item">
          <a href="detail/{{$project -> id}}" class="c-textbox u-mb_m">{{$project -> title}}</a>
        </div>
        @endforeach
      </div>
    </section>

  </article>

  @component('components.mymenu')
  @endcomponent

</main>

@endsection
