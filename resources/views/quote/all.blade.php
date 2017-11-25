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
    <a href="/quote/single">Link</a>

    <p><a class="btn btn-primary btn-sm" href="#" role="button">Another Random &raquo;</a></p>

@endsection

@section('content')
    <div class="container all_content">

        <div class="row">


            @foreach($quotes as $quote)

                <a href="/quote/single">
                    <figure class="figure">
                        <blockquote>
                            {{$quote->quote}}
                        </blockquote>
                        <figcaption class="figure-caption">
                            {{$quote->philosopher->name}}
                        </figcaption>
                    </figure>
                </a>
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
