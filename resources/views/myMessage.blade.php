@extends('layouts.template')

@section('title', 'myComment')
@include('layouts.head')

@section('contents')

<main class="main u-flex">

@component('components.maincontent')
 @component('components.panel')
 @endcomponent
@endcomponent

  @component('components.mymenu')
  @endcomponent

</main>

@endsection
