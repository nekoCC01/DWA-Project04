@extends('layouts.master')


@section('title')
    Quote all
@endsection


@push('head')

@endpush

@section('featured_content')

    <p>A Random Quote</p>
    <p><a class="btn btn-primary btn-sm" href="#" role="button">Another Random &raquo;</a></p>

@endsection

@section('content')
    <div class="container all_content">

        <div class="row">
            <figure class="figure">
                <blockquote>
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                    labore et dolore magna aliquyam erat,
                    sed diam voluptua. At vero eos et accusam et
                </blockquote>
                <figcaption class="figure-caption">
                    Plato Augustinus Kant
                </figcaption>
            </figure>
            <a href="/quote/single">Link</a>
            <hr>
            <figure class="figure">
                <blockquote>
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                    labore et dolore magna aliquyam erat,
                    sed diam voluptua. At vero eos et accusam et
                </blockquote>
                <figcaption class="figure-caption">
                    Plato Augustinus Kant
                </figcaption>
            </figure>
            <hr>
            <figure class="figure">
                <blockquote>
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                    labore et dolore magna aliquyam erat,
                    sed diam voluptua. At vero eos et accusam et
                </blockquote>
                <figcaption class="figure-caption">
                    Plato Augustinus Kant
                </figcaption>
            </figure>

        </div>

    </div>

@endsection


@push('body')
    <script type="text/javascript">
        $('.nav-item').removeClass('active');
        $('#quotes').addClass('active');
    </script>
@endpush
