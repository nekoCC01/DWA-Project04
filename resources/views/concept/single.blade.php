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

                @if($edit_concept)
                    <form action="/concept/update/{{$selected_concept->id}}" method="POST">

                        {{ csrf_field() }}

                        <div class='form-group'>
                            <input type='text' class='form-control' name='concept' id='concept'
                                   value='{{ old('concept', $selected_concept->concept) }}'>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Concept</button>
                    </form>
                @else
                    <h3><span class="badge badge-secondary">{{$selected_concept->concept}}</span></h3>
                    <a href="/concept/edit/{{$selected_concept->id}}">Edit Concept</a>
                @endif

                <a href="/concept/delete/{{$selected_concept->id}}">Delete</a>

            </div>
            <div class="row">
                Definitions:
                <ul>

                    @foreach ($selected_concept->definitions as $definition)
                        <li>
                            {{$definition->definition}} <br>
                            by {{$definition->philosopher->name}}
                            <a href="/concept/edit_definition/{{$definition->id}}">Edit</a> /
                            <a href="/concept/delete_definition/{{$selected_concept->id}}/{{$definition->id}}">Delete</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!-- TODO pass the value of $selected_concept->id so that it is available to the form and can be passed as a hidden input from there -->
            <a href="/concept/create_definition">Create a new definition</a>
        </div>
    </div>

@endsection

@section('content')

    <div class="container-fluid related">
        <div class="container">

            <div class="row">
                <div class="col">
                    <h3>Related Quotes</h3>

                    @if($showQuoteForm)
                        <form method='POST' action='/concept/store_quote/{{$selected_concept->id}}'>

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
                        <a href="/concept/add_quote/{{$selected_concept->id}}">Add another quote</a>
                    @endif



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

                    @if($showArgumentForm)
                        <form method='POST' action='/concept/store_argument/{{$selected_concept->id}}'>

                            {{ csrf_field() }}

                            <div class='form-group'>
                                <select class='form-control' name='argument' id='argument'>
                                    <option value="">- Select an argument -</option>
                                    @foreach ($arguments as $argument)
                                        <option value="{{$argument->id}}">{{$argument->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Argument</button>
                        </form>
                    @else
                        <a href="/concept/add_argument/{{$selected_concept->id}}">Add another argument</a>
                    @endif

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
