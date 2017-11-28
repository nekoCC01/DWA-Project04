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
                    <a href="/argument/unlink/concept/{{$selected_argument->id}}/{{$related_concept->id}}">Unlink</a>

                @endforeach



                @if($showConceptForm)

                    <form method='POST' action='/argument/store_concept/{{$selected_argument->id}}'>

                        {{ csrf_field() }}

                        <div class='form-group'>
                            <select class='form-control' name='concept' id='concept'>
                                <option value="">- Select a concept -</option>
                                @foreach ($concepts as $concept)
                                    <option value="{{$concept->id}}">{{$concept->concept}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Concept</button>
                    </form>

                @else
                    <a href="/argument/add_concept/{{$selected_argument->id}}">Add another concept</a>
                @endif

            </div>
        </div>
    </div>

    <div class="container-fluid related">
        <div class="container">


            <div class="row">
                <h3>Related Quotes</h3>

                @if($showQuoteForm)
                    <form method='POST' action='/argument/store_quote/{{$selected_argument->id}}'>

                        {{ csrf_field() }}

                        <div class='form-group'>
                            <select class='form-control' name='quote' id='quote'>
                                <option value="">- Select a quote -</option>
                                @foreach ($quotes as $quote)
                                    <option value="{{$quote->id}}">{{$quote->quote}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Quote</button>
                    </form>
                @else
                    <a href="/argument/add_quote/{{$selected_argument->id}}">Add another quote</a>
                @endif



                @foreach ($selected_argument->quotes as $related_quote)

                    <figure class="figure">
                        <blockquote>
                            {{$related_quote->quote}}
                        </blockquote>
                        <figcaption class="figure-caption">
                            {{$related_quote->philosopher->name}}
                        </figcaption>
                    </figure>
                    <a href="/quote/single/{{$related_quote->id}}">View</a> /
                    <a href="/argument/unlink/quote/{{$selected_argument->id}}/{{$related_quote->id}}">Unlink</a>
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
