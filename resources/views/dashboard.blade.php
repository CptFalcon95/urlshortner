{{--
    Template: Dashboard for logged in user
--}}

@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {{-- Include the card for creating a shortened URL  --}}
            @include('partials.admin.cards.creation_form')

            {{-- Include the card for displaying the user's shortened URL's  --}}
            @include('partials.admin.cards.urls_list')

        </div>

    </div>
</div>
@endsection
