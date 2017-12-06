@extends('layouts.master')


@section('title')
    Quote all
@endsection

@section('current_position')
    Concepts
@endsection

@section('featured_content')

@endsection

@section('content')

    <div class="container-fluid concepts">
        <div class="container">
            <div class="row">
                <h3>All concepts</h3>
            </div>
            <div class="row">

                @foreach($concepts as $concept)
                    <a href="/concept/single/{{$concept->id}}"><span
                                class="badge badge-secondary">{{$concept->concept}}</span></a>
                @endforeach
            </div>


            @if($showForm)
                <div class="row">

                    <form class="form_inline" method='POST' action='/concept'>

                        {{ csrf_field() }}

                        <div class='form-group'>
                            <input type='text' class='form-control' name='concept' id='concept'
                                   placeholder='Enter concept'
                                   value='{{ old('concept', '') }}'>
                            @include('modules.error-field', ['fieldName' => 'concept'])
                        </div>

                        <button type="submit" class="btn btn-primary">Add Concept</button>
                    </form>
                </div>
            @else
                <div class="row">
                    <hr>
                    <p><a class="btn btn-primary btn-sm" href="/concept/create" role="button">Add new concept</a></p>

                </div>
            @endif


        </div>
    </div>

@endsection


@push('body')
    <script type="text/javascript">
        $('.nav-item').removeClass('active');
        $('#concepts').addClass('active');
    </script>
@endpush
