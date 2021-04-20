@extends('layouts.redirect')

@section('content')
<div class="alert alert-success">
    <p class="mb-0 py-2 text-center w-100">{{ __('all.redirecting')}} {{$url}}</p>
</div>
@endsection

@php
    header('Refresh: 3; URL='.$url);
@endphp
