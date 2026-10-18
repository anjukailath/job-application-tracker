
@extends('layouts.app')

@section('title', 'Edit Application')

@section('content')

<h1 class="h3 mb-3">Edit application</h1>

<form method="POST"
      action="{{ route('applications.update', $application) }}"
      class="card card-body">

    @csrf
    @method('PUT')

    @include('applications._form')

</form>

@endsection
