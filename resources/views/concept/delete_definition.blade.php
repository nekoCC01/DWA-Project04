@extends('layouts.master')

@section('current_position')
    Delete definition
@endsection


@section('featured_content')

    <div class="container-fluid concepts">
        <div class="container">
            <div class="row">
                <h3><span class="badge badge-secondary">{{$concept->concept}}</span></h3>
            </div>
            <div class="row">
                Definition:
                <ul>
                        <li>
                            {{$definition->definition}} <br>
                            <i>by {{$definition->philosopher->name}}</i>
                        </li>
                </ul>
            </div>
        </div>
    </div>


@endsection


@section('content')

    <div class="container-fluid welcome">
        <div class="text-center">
            <h3>Are you sure you want to delete this concept?</h3>
            <form method='POST' action='/concept/destroy_definition/{{ $concept->id }}/{{$definition->id}}'>
                {{ method_field('delete') }}
                {{ csrf_field() }}
                <input type='submit' value='Yes, delete it!' class='btn btn-danger btn-small'>
            </form>
            <br>
            <a class="btn btn-primary" href="{{ $previousUrl }}" role="button">No, I changed my mind.</a>

        </div>
    </div>

@endsection