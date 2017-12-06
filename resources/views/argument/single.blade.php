@extends('layouts.master')


@section('title')
    Argument single
@endsection


@section('current_position')
    Arguments > Detail View
@endsection

@section('featured_content')



    <div class="old_paper">
        <div class="row">
            <h2>{{$selected_argument->title}}</h2>
        </div>
        <div class="row">
            <div class="col-5">
                {{$selected_argument->assumption}}
            </div>
            <div class="col-2">
                <img src="/img/argument_arrow.svg"
                     alt="">
            </div>
            <div class="col-5">
                {{$selected_argument->conclusion}}
            </div>
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

                    <a href="/concept/single/{{$related_concept->id}}"><span
                                class="badge badge-secondary">{{$related_concept->concept}}</span></a>
                    <a href="/argument/unlink/concept/{{$selected_argument->id}}/{{$related_concept->id}}"
                       class="icon small">
                        <img src="/img/unlink-icon.svg" alt="">
                    </a>

                @endforeach

            </div>

            @if($showConceptForm)
                <div class="row">
                    <form class="form_inline" method='POST' action='/argument/store_concept/{{$selected_argument->id}}'>

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
                </div>
            @else
                <div class="row">
                    <hr>
                    <p><a class="btn btn-primary btn-sm" href="/argument/add_concept/{{$selected_argument->id}}"
                          role="button">Link to another concept</a></p>
                </div>
            @endif

        </div>
    </div>

    <div class="container-fluid related">
        <div class="container">


            <div class="row">
                <h3>Related Quotes</h3>
            </div>

            @if($showQuoteForm)
                <div class="row">
                    <form class="form_inline" method='POST' action='/argument/store_quote/{{$selected_argument->id}}'>

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
                </div>
            @else

                <div class="row">
                    <p><a class="btn btn-primary btn-sm" href="/argument/add_quote/{{$selected_argument->id}}"
                          role="button">Link to another quote</a></p>
                    <hr>
                </div>
            @endif



            @foreach ($selected_argument->quotes as $related_quote)


                <div class="row">
                    @include('modules.blogquote', ['content' => $related_quote->quote, 'attribution' => $related_quote->philosopher->name])

                </div>

                <div class="row">
                    <br>
                    <a href="/quote/single/{{$related_quote->id}}" class="icon">
                        <img src="/img/view-icon.svg" alt="">
                        View
                    </a>
                    <a href="/argument/unlink/quote/{{$selected_argument->id}}/{{$related_quote->id}}" class="icon">
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
    <script type="text/javascript">
        $('.nav-item').removeClass('active');
        $('#arguments').addClass('active');
    </script>
@endpush
