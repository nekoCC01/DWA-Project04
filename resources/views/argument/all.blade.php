@extends('layouts.master')


@section('title')
    Quote all
@endsection


@push('head')

@endpush

@section('featured_content')

@endsection

@section('content')
    <div class="container all_content">

        <a href="/argument/create">Add new argument</a>

        <div class="row">

            @foreach ($arguments as $argument)


                <figure class="figure">
                    <h3>{{$argument->title}}</h3>
                    <blockquote>
                        {{$argument->assumption}} --> {{$argument->conclusion}}
                    </blockquote>
                    <figcaption class="figure-caption">
                        {{$argument->philosopher->name}}
                    </figcaption>
                </figure>
                <a href="/argument/single/{{$argument->id}}">View</a> |
                <a href="/argument/edit/{{$argument->id}}">Edit</a> |
                <a href="/argument/delete/{{$argument->id}}">Delete</a>
                <hr>

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
