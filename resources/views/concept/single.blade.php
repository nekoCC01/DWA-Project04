@extends('layouts.master')


@section('title')
    Concept single
@endsection


@push('head')

@endpush

@section('featured_content')

    <div class="container-fluid concepts">
        <div class="container">
            <div class="row">
                <h3><span class="badge badge-secondary">{{$selected_concept->concept}}</span></h3>
            </div>
            <div class="row">
                Definitions:
                <ul>

                    @foreach ($selected_concept->definitions as $definition)
                        <li>
                            {{$definition->definition}} <br>
                            by {{$definition->philosopher->name}}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection

@section('content')

    <div class="container-fluid related">
        <div class="container">

            <div class="row">
                <div class="col">
                    <h3>Related Quotes</h3>

                    @foreach ($selected_concept->quotes as $related_quote)
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
                <div class="col">

                    <h3>Related Arguments</h3>

                    @foreach ($selected_concept->arguments as $related_argument)
                        <figure class="figure">
                            <blockquote>
                                {{$related_argument->title}}
                            </blockquote>
                            <figcaption class="figure-caption">
                                {{$related_argument->philosopher->name}}
                            </figcaption>
                        </figure>
                        <a href="/argument/single/{{$related_argument->id}}">Link</a>
                        <hr>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

@endsection

@push('body')
    <script type="text/javascript">
        $('.nav-item').removeClass('active');
        $('#concepts').addClass('active');
    </script>
@endpush
