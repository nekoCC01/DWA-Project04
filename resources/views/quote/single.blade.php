@extends('layouts.master')


@section('title')
    Quote single
@endsection


@push('head')

@endpush

@section('featured_content')

    <p>The selected Quote = {{$selected_quote->quote}}</p>
    {{$selected_quote->philosopher->name}}

@endsection

@section('content')

    <div class="container-fluid concepts">
        <div class="container">
            <div class="row">
                <h3>Related concepts</h3>
            </div>
            <div class="row">

                @foreach ($selected_quote->concepts as $related_concept)
                    <span class="badge badge-secondary">{{$related_concept->concept}}</span>
                @endforeach

            </div>
        </div>
    </div>

    <div class="container-fluid related">
        <div class="container">


            <div class="row">
                <h2>Related Arguments</h2>

                @foreach($selected_quote->arguments as $related_argument)

                    <figure class="figure">
                        <blockquote>
                            {{$related_argument->assumption}} --> {{$related_argument->conclusion}}
                        </blockquote>
                        <figcaption class="figure-caption">
                            {{$related_argument->philosopher->name}}
                        </figcaption>
                    </figure>
                    <a href="/quote/single">Link</a>
                    <hr>


                @endforeach


            </div>
        </div>
    </div>




@endsection


@push('body')
    <script type="text/javascript">
        $('.nav-item').removeClass('active');
        $('#quotes').addClass('active');
    </script>
@endpush
