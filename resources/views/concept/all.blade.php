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
                <a href="/concept/single"><span class="badge badge-secondary">New</span></a>
                <span class="badge badge-secondary">New</span>
                <span class="badge badge-secondary">New</span>
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
