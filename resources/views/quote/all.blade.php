@extends('layouts.master')


@section('title')
    Quote all
@endsection


@push('head')

@endpush

@section('featured_content')

    @include('modules.blogquote', ['content' => $random_quote->quote, 'attribution' => $random_quote->philosopher->name])

    <a href="/quote/single/{{$random_quote->philosopher->id}}">Link</a>

    <p><a class="btn btn-primary btn-sm" href="/quote/all" role="button">Another Random &raquo;</a></p>

@endsection

@section('content')
    <div class="container all_content">


        <a href="/quote/create">Add new quote</a>

        <div class="row">

            @foreach($quotes as $quote)

                @include('modules.blogquote', ['content' => $quote->quote, 'attribution' => $quote->philosopher->name])

                <a href="/quote/single/{{$quote->id}}" class="quote_link">View</a> /
                <a href="/quote/edit/{{$quote->id}}">Edit</a> /
                <a href="/quote/delete/{{$quote->id}}">Delete</a>
                <hr>

            @endforeach

        </div>

    </div>

@endsection


@push('body')
    <script type="text/javascript">
        $('.nav-item').removeClass('active');
        $('#quotes').addClass('active');
    </script>
@endpush
