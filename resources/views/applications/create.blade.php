
@extends('layouts.app')

@section('title', 'Add Application')

@section('content')

<h1 class="h3 mb-3">Add application</h1>

<form method="POST"
      action="{{ route('applications.store') }}"
      class="card card-body">

    @csrf

    @include('applications._form')

</form>

@endsection
