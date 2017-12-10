@extends('layouts.master')


@section('title')
    Quote all
@endsection

@section('current_position')
    Quotes
@endsection

@section('featured_content')

    <div class="old_paper">
        @include('modules.blogquote', ['content' => $random_quote->quote, 'attribution' => $random_quote->philosopher->name])

        <p><a class="btn btn-primary btn-sm" href="/quote/all" role="button">Another Random &raquo;</a></p>
    </div>
@endsection

@section('content')

    @isset($alert_delete)
        TEST CONTENT
    @endisset


    <div class="container all_content">

        <div class="row">
            <p><a class="btn btn-primary btn-sm" href="/quote/create" role="button">Add new quote</a></p>
            <hr>
        </div>
        @foreach($quotes as $quote)
            <div class="row">

                @include('modules.blogquote', ['content' => $quote->quote, 'attribution' => $quote->philosopher->name])

            </div>
            <div class="row">
                <br>
                <a href="/quote/single/{{$quote->id}}" class="icon">
                    <img src="/img/view-icon.svg" alt="">
                    View
                </a>
                <a href="/quote/edit/{{$quote->id}}" class="icon">
                    <img src="/img/edit-icon.svg" alt="">
                    Edit
                </a>
                <a href="/quote/delete/{{$quote->id}}" class="icon">
                    <img src="/img/delete-icon.svg" alt="">
                    Delete
                </a>
                <hr>
            </div>

        @endforeach

    </div>

@endsection


@push('body')
    <script>
        $('.nav-item').removeClass('active');
        $('#quotes').addClass('active');
    </script>
@endpush
