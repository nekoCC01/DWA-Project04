@extends('layouts.master')


@section('title')
    Quote single
@endsection


@push('head')

@endpush

@section('featured_content')

    <p>The selected Quote = {{$quote_id}}</p>

@endsection

@section('content')

    <div class="container-fluid concepts">
        <div class="container">
            <div class="row">
                <h3>Related concepts</h3>
            </div>
            <div class="row">
                <span class="badge badge-secondary">New</span>
                <span class="badge badge-secondary">New</span>
                <span class="badge badge-secondary">New</span>
            </div>
        </div>
    </div>

    <div class="container-fluid related">
        <div class="container">


            <div class="row">
                <h2>Related Arguments</h2>
                <figure class="figure">
                    <blockquote>
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt
                        ut
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
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt
                        ut
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
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt
                        ut
                        labore et dolore magna aliquyam erat,
                        sed diam voluptua. At vero eos et accusam et
                    </blockquote>
                    <figcaption class="figure-caption">
                        Plato Augustinus Kant
                    </figcaption>
                </figure>

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
