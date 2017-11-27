@extends('layouts.master')


@section('title')
    Quote all
@endsection


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
    <a href="/quote/single/{{$random_quote->philosopher->id}}">Link</a>

    <p><a class="btn btn-primary btn-sm" href="/quote/all" role="button">Another Random &raquo;</a></p>

@endsection

@section('content')
    <div class="container all_content">


        <a href="/quote/create">Add new quote</a>

        <div class="row">

            @foreach($quotes as $quote)

                <figure class="figure">
                    <a href="/quote/single/{{$quote->id}}" class="quote_link">
                        <blockquote>
                            {{$quote->quote}}
                        </blockquote>
                    </a>
                    <figcaption class="figure-caption">
                        {{$quote->philosopher->name}}
                    </figcaption>
                </figure>

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
