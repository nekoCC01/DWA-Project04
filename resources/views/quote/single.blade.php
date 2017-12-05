@extends('layouts.master')


@section('title')
    Quote single
@endsection


@push('head')

@endpush

@section('featured_content')

    @include('modules.blogquote', ['content' => $selected_quote->quote, 'attribution' => $selected_quote->philosopher->name])

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
                    <a href="/quote/unlink/concept/{{$selected_quote->id}}/{{$related_concept->id}}">Unlink</a>
                @endforeach

                @if($showConceptForm)

                    <form method='POST' action='/quote/store_concept/{{$selected_quote->id}}'>

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
                    <a href="/quote/add_concept/{{$selected_quote->id}}">Add another concept</a>
                @endif


            </div>
        </div>
    </div>

    <div class="container-fluid related">
        <div class="container">


            <div class="row">
                <h2>Related Arguments</h2>


                @if ($showArgumentForm)
                    <form method='POST' action='/quote/store_argument/{{$selected_quote->id}}'>

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
                    <a href="/quote/add_argument/{{$selected_quote->id}}">Add another argument</a>

                @endif



                @foreach($selected_quote->arguments as $related_argument)

                    @include('modules.blogquote', [
                        'content' => $related_argument->assumption . " -> " . $related_argument->conclusion,
                        'attribution' => $selected_quote->philosopher->name
                    ])


                    <a href="/argument/single/{{$related_argument->id}}">View</a> |
                    <a href="/quote/unlink/argument/{{$selected_quote->id}}/{{$related_argument->id}}">Unlink</a>
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
