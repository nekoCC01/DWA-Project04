@extends('layouts.master')

@section('current_position')
    Delete quote
@endsection


@section('featured_content')

    <div class="old_paper">
        @include('modules.blogquote', [
            'content' => $quote->quote,
            'attribution' => $quote->philosopher->name
        ])
    </div>
@endsection


@section('content')

    <div class="container-fluid welcome">
        <div class="text-center">
            <h3>Are you sure you want to delete this quote?</h3>
            <form method='POST' action='/quote/destroy/{{ $quote->id }}'>
                {{ method_field('delete') }}
                {{ csrf_field() }}
                <input type='submit' value='Yes, delete it!' class='btn btn-danger btn-small'>
            </form>
            <br>
            <a class="btn btn-primary" href="{{ $previousUrl }}" role="button">No, I changed my mind.</a>

        </div>
    </div>

@endsection