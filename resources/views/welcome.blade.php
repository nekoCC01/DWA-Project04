@extends('layouts.master')

@push('head')

@endpush


@section('featured_content')

    @include('modules.blogquote', ['content' => $random_quote->quote, 'attribution' => $random_quote->philosopher->name])

@endsection


@section('content')

    <div class="container">
        <div class="row text-center">
            Welcome to the web of thoughts
        </div>
    </div>

@endsection