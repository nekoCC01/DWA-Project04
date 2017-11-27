@extends('layouts.master')


@section('title')
    Argument single
@endsection


@push('head')

@endpush

@section('featured_content')

    <h2>{{$selected_argument->title}}</h2>
    <div class="row justify-content-md-center">
        <div class="col col-lg-2">
            {{$selected_argument->assumption}}
        </div>
        <div class="col-md-auto">
            <img src="/img/arrow_right.png"
                 alt="" width="20%">
        </div>
        <div class="col col-lg-2">
            {{$selected_argument->conclusion}}
        </div>
    </div>

@endsection

@section('content')

    <div class="container-fluid concepts">
        <div class="container">
            <div class="row">
                <h3>Related concepts</h3>
            </div>
            <div class="row">

                @foreach ($selected_argument->concepts as $related_concept)

                    <a href="/concept/single/{{$related_concept->id}}">
                        <span class="badge badge-secondary">{{$related_concept->concept}}</span>
                    </a>

                @endforeach

            </div>
        </div>
    </div>

    <div class="container-fluid related">
        <div class="container">


            <div class="row">
                <h3>Related Quotes</h3>

                @foreach ($selected_argument->quotes as $related_quote)

                    <figure class="figure">
                        <blockquote>
                            {{$related_quote->quote}}
                        </blockquote>
                        <figcaption class="figure-caption">
                            {{$related_quote->philosopher->name}}
                        </figcaption>
                    </figure>
                    <a href="/quote/single/{{$related_quote->id}}">Link</a>
                    <hr>

                @endforeach

            </div>
        </div>
    </div>


@endsection


@push('body')
    <script type="text/javascript">
        $('.nav-item').removeClass('active');
        $('#arguments').addClass('active');
    </script>
@endpush
