@extends('layouts.master')


@section('title')
    Quote all
@endsection


@push('head')

@endpush

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
        </div>
    </div>

@endsection


@push('body')
    <script type="text/javascript">
        $('.nav-item').removeClass('active');
        $('#quotes').addClass('active');
    </script>
@endpush
