@extends('layouts.master')

@section('current_position')
    Delete argument
@endsection


@section('featured_content')

    <div class="old_paper">
        <div class="row">
            <h2>{{$argument->title}}</h2>
        </div>
        <div class="row">
            <div class="col-5">
                {{$argument->assumption}}
            </div>
            <div class="col-2">
                <img src="/img/argument_arrow.svg"
                     alt="">
            </div>
            <div class="col-5">
                {{$argument->conclusion}}
            </div>
        </div>
    </div>


@endsection


@section('content')

    <div class="container-fluid welcome">
        <div class="text-center">
            <h3>Are you sure you want to delete this argument?</h3>
            <form method='POST' action='/argument/destroy/{{ $argument->id }}'>
                {{ method_field('delete') }}
                {{ csrf_field() }}
                <input type='submit' value='Yes, delete it!' class='btn btn-danger btn-small'>
            </form>
            <br>
            <a class="btn btn-primary" href="{{ $previousUrl }}" role="button">No, I changed my mind.</a>

        </div>
    </div>

@endsection