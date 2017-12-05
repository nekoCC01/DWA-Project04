@extends('layouts.master')

@push('head')

@endpush


@section('featured_content')

    <div class="old_paper">
        @include('modules.blogquote', [
            'content' => $random_quote->quote,
            'attribution' => $random_quote->philosopher->name
        ])

        <p><a class="btn btn-primary btn-sm" href="/" role="button">Another Random &raquo;</a></p>
    </div>
@endsection


@section('content')

    <div class="container-fluid welcome">
        <div class="text-center">
            <h3>Welcome to the web of thoughts!</h3>
            Here you find inter-connected quotes, concepts and arguments. <br>
            A web of ideas, that grows with the user´s input <br>
            and allows you to build new connections.
        </div>
    </div>

@endsection