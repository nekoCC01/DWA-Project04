@extends('layouts.master')


@section('title')
    Argument single
@endsection


@push('head')

@endpush

@section('featured_content')

    <h2>Hume´s guillotine</h2>
    <div class="row justify-content-md-center">
        <div class="col col-lg-2">
            We can not derive an ´ought´- from an ´is´-statement.
        </div>
        <div class="col-md-auto">
            <img src="/img/arrow_right.png"
                 alt="" width="20%">
        </div>
        <div class="col col-lg-2">
            The world of value is separated from the world of fact.
        </div>
    </div>

    <p><a class="btn btn-primary btn-sm" href="#" role="button">Another Random &raquo;</a></p>

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
                <h3>Related Quotes</h3>
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
        $('#arguments').addClass('active');
    </script>
@endpush
