@extends('layouts.master')


@section('title')
    Quote single
@endsection

@section('current_position')
    Quotes > Detail View
@endsection

@section('featured_content')

    <div class="old_paper">
        @include('modules.blogquote', ['content' => $selected_quote->quote, 'attribution' => $selected_quote->philosopher->name])
    </div>
@endsection

@section('content')



    <div class="container-fluid concepts">
        <div class="container">
            <div class="row">
                <h3>Related concepts</h3>
            </div>
            <div class="row">

                @foreach ($selected_quote->concepts as $related_concept)
                    <a href="/concept/single/{{$related_concept->id}}"><span
                                class="badge badge-secondary">{{$related_concept->concept}}</span></a>
                    <a href="/quote/unlink/concept/{{$selected_quote->id}}/{{$related_concept->id}}" class="icon small">
                        <img src="/img/unlink-icon.svg" alt="">
                    </a>
                @endforeach
            </div>

            @if($showConceptForm)

                <div class="row">
                    <form class="form_inline" method='POST' action='/quote/store_concept/{{$selected_quote->id}}'>

                        {{ csrf_field() }}

                        <div class='form-group'>
                            <select class='form-control' name='concept' id='concept'>
                                <option value="">- Select a concept -</option>
                                @foreach ($concepts as $concept)
                                    <option value="{{$concept->id}}">{{$concept->concept}}</option>
                                @endforeach
                            </select>
                        </div>
                        @include('modules.error-field', ['fieldName' => 'concept'])
                        <button type="submit" class="btn btn-primary">Add Concept</button>
                    </form>
                </div>
            @else
                <div class="row">
                    <hr>
                    <p><a class="btn btn-primary btn-sm" href="/quote/add_concept/{{$selected_quote->id}}"
                          role="button">Link to another concept</a></p>
                </div>

            @endif


        </div>
    </div>

    <div class="container-fluid related">
        <div class="container">


            <div class="row">
                <h2>Related Arguments</h2>
            </div>
            @if ($showArgumentForm)
                <div class="row">
                    <form class="form_inline" method='POST' action='/quote/store_argument/{{$selected_quote->id}}'>

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
                </div>
            @else
                <div class="row">
                    <p><a class="btn btn-primary btn-sm" href="/quote/add_argument/{{$selected_quote->id}}"
                          role="button">Link to another argument</a></p>
                    <hr>
                </div>

            @endif



            @foreach($selected_quote->arguments as $related_argument)

                <div class="row">
                    @include('modules.blogquote', [
                        'content' => $related_argument->assumption . " -> " . $related_argument->conclusion,
                        'attribution' => $selected_quote->philosopher->name
                    ])
                </div>

                <div class="row">
                    <br>
                    <a href="/argument/single/{{$related_argument->id}}" class="icon">
                        <img src="/img/view-icon.svg" alt="">
                        View
                    </a>
                    <a href="/quote/unlink/argument/{{$selected_quote->id}}/{{$related_argument->id}}" class="icon">
                        <img src="/img/unlink-icon.svg" alt="">
                        Unlink
                    </a>
                    <hr>
                </div>

            @endforeach


        </div>
    </div>


@endsection


@push('body')
    <script>
        $('.nav-item').removeClass('active');
        $('#quotes').addClass('active');
    </script>
@endpush
