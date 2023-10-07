@extends('layouts.app')

@section('content')
  <div id="app">
    <navbar></navbar>
    <div class="container">
      <posts></posts>
    </div>
  </div>
  {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
@endsection
