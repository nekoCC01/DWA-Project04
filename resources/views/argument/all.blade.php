@extends('layouts.master')


@section('title')
    Argument all
@endsection

@section('current_position')
    Arguments
@endsection


@section('content')
    <div class="container all_content">

        <div class="row">
            <p><a class="btn btn-primary btn-sm" href="/argument/create" role="button">Add new argument</a></p>
            <hr>
        </div>

        @foreach ($arguments as $argument)

            <div class="row">
                <h3>{{$argument->title}}</h3>
            </div>
            <div class="row">

                @include('modules.blogquote', [
                        'content' => $argument->assumption . " -> " . $argument->conclusion,
                        'attribution' => $argument->philosopher->name
                    ])

            </div>
            <div class="row">
                <br>
                <a href="/argument/single/{{$argument->id}}" class="icon">
                    <img src="/img/view-icon.svg" alt="">
                    View
                </a>
                <a href="/argument/edit/{{$argument->id}}" class="icon">
                    <img src="/img/edit-icon.svg" alt="">
                    Edit
                </a>
                <a href="/argument/delete/{{$argument->id}}" class="icon">
                    <img src="/img/delete-icon.svg" alt="">
                    Delete
                </a>
                <hr>
            </div>

        @endforeach


    </div>

@endsection


@push('body')
    <script>
        $('.nav-item').removeClass('active');
        $('#arguments').addClass('active');
    </script>
@endpush
