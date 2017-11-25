@extends('layouts.master')

@push('head')

@endpush


@section('featured_content')

    <figure class="figure">
        <blockquote>
            {{$random_quote->quote}}
        </blockquote>
        <figcaption class="figure-caption">
            {{$random_quote->philosopher->name}}
        </figcaption>
    </figure>

@endsection


@section('content')

    <div class="container">
        <div class="row text-center">
            Welcome to the web of thoughts
        </div>
    </div>

@endsection