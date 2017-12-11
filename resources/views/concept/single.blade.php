@extends('layouts.master')


@section('title')
    Concept single
@endsection


@section('current_position')
    Concepts > Detail View
@endsection

@section('featured_content')

    <div class="container-fluid concepts">
        <div class="container">
            <div class="row">

                @if($edit_concept)
                    <form class="form_inline" action="/concept/update/{{$selected_concept->id}}" method="POST">

                        {{ csrf_field() }}

                        <div class='form-group'>
                            <input type='text' class='form-control' name='concept' id='concept'
                                   value='{{ old('concept', $selected_concept->concept) }}'>
                        </div>
                        @include('modules.error-field', ['fieldName' => 'concept'])
                        <button type="submit" class="btn btn-primary">Save Concept</button>
                    </form>
                @else
                    <h3><span class="badge badge-secondary">{{$selected_concept->concept}}</span></h3>

                    <a href="/concept/edit/{{$selected_concept->id}}" class="icon">
                        <img src="/img/edit-icon.svg" alt="">
                        Edit
                    </a>
                @endif

                <a href="/concept/delete/{{$selected_concept->id}}" class="icon">
                    <img src="/img/delete-icon.svg" alt="">
                    Delete
                </a>

            </div>
            <div class="row">
                Definitions:
                <ul>

                    @foreach ($selected_concept->definitions as $definition)
                        <li>
                            {{$definition->definition}} <br>
                            <i>by {{$definition->philosopher->name}}</i>
                            <a href="/concept/edit_definition/{{$definition->id}}">Edit</a> /
                            <a href="/concept/delete_definition/{{$selected_concept->id}}/{{$definition->id}}">Delete</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!-- TODO pass the value of $selected_concept->id so that it is available to the form and can be passed as a hidden input from there -->
            <div class="row">
                <hr>
                <p><a class="btn btn-primary btn-sm" href="/concept/create_definition/{{$selected_concept->id}}" role="button">Create a new
                        definition</a></p>
            </div>
        </div>
    </div>

@endsection

@section('content')

    <div class="container-fluid related">
        <div class="container">

            <div class="row">
                <div class="col-5">
                    <div class="row">
                        <h2>Related Quotes</h2>
                    </div>

                    @if($showQuoteForm)
                        <form class="form_inline" method='POST' action='/concept/store_quote/{{$selected_concept->id}}'>

                            {{ csrf_field() }}

                            <div class='form-group'>
                                <select class='form-control' name='quote' id='quote'>
                                    <option value="">- Select a quote -</option>
                                    @foreach ($quotes as $quote)
                                        <option value="{{$quote->id}}">{{$quote->quote}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @include('modules.error-field', ['fieldName' => 'quote'])
                            <button type="submit" class="btn btn-primary">Add Quote</button>
                        </form>
                        <hr>
                    @else
                        <div class="row">
                            <p><a class="btn btn-primary btn-sm" href="/concept/add_quote/{{$selected_concept->id}}"
                                  role="button">Link to another quote</a></p>
                            <hr>
                        </div>

                    @endif



                    @foreach ($selected_concept->quotes as $related_quote)


                        <div class="row">
                            @include('modules.blogquote', ['content' => $related_quote->quote, 'attribution' => $related_quote->philosopher->name])

                        </div>

                        <div class="row">
                            <br>
                            <a href="/quote/single/{{$related_quote->id}}" class="icon">
                                <img src="/img/view-icon.svg" alt="">
                                View
                            </a>
                            <a href="/concept/unlink/quote/{{$selected_concept->id}}/{{$related_quote->id}}"
                               class="icon">
                                <img src="/img/unlink-icon.svg" alt="">
                                Unlink
                            </a>
                            <hr>
                        </div>

                    @endforeach

                </div>
                <div class="col"></div>
                <div class="col-5">

                    <div class="row">
                        <h2>Related Arguments</h2>
                    </div>

                    @if($showArgumentForm)
                        <form class="form_inline" method='POST' action='/concept/store_argument/{{$selected_concept->id}}'>

                            {{ csrf_field() }}

                            <div class='form-group'>
                                <select class='form-control' name='argument' id='argument'>
                                    <option value="">- Select an argument -</option>
                                    @foreach ($arguments as $argument)
                                        <option value="{{$argument->id}}">{{$argument->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @include('modules.error-field', ['fieldName' => 'argument'])
                            <button type="submit" class="btn btn-primary">Add Argument</button>
                        </form>
                    @else
                        <div class="row">
                            <p><a class="btn btn-primary btn-sm" href="/concept/add_argument/{{$selected_concept->id}}"
                                  role="button">Link to another argument</a></p>
                            <hr>
                        </div>
                    @endif

                    @foreach ($selected_concept->arguments as $related_argument)

                        <div class="row">
                            @include('modules.blogquote', ['content' => $related_argument->title, 'attribution' => $related_argument->philosopher->name])

                        </div>

                        <div class="row">
                            <br>
                            <a href="/argument/single/{{$related_argument->id}}" class="icon">
                                <img src="/img/view-icon.svg" alt="">
                                View
                            </a>
                            <a href="/concept/unlink/argument/{{$selected_concept->id}}/{{$related_argument->id}}"
                               class="icon">
                                <img src="/img/unlink-icon.svg" alt="">
                                Unlink
                            </a>
                            <hr>
                        </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div>

@endsection

@push('body')
    <script>
        $('.nav-item').removeClass('active');
        $('#concepts').addClass('active');
    </script>
@endpush
