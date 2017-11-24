@extends('layouts.master')


@section('title')
    Concept single
@endsection


@push('head')

@endpush

@section('featured_content')

    <div class="container-fluid concepts">
        <div class="container">
            <div class="row">
                <h3><span class="badge badge-secondary">Concept</span></h3>
            </div>
            <div class="row">
                Definitions:
                <ul>
                    <li>
                        Defnition
                    </li>
                    <li>
                        Defnition
                    </li>
                    <li>
                        Defnition
                    </li>
                    <li>
                        Defnition
                    </li>
                </ul>
            </div>
        </div>
    </div>

@endsection

@section('content')

    <div class="container-fluid related">
        <div class="container">


            <div class="row">
                <div class="col">

                    <h3>Related Quotes</h3>
                    <figure class="figure">
                        <blockquote>
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                            invidunt
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
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                            invidunt
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
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                            invidunt
                            ut
                            labore et dolore magna aliquyam erat,
                            sed diam voluptua. At vero eos et accusam et
                        </blockquote>
                        <figcaption class="figure-caption">
                            Plato Augustinus Kant
                        </figcaption>
                    </figure>


                </div>
                <div class="col">


                    <h3>Related Arguments</h3>
                    <figure class="figure">
                        <blockquote>
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                            invidunt
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
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                            invidunt
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
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                            invidunt
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
    </div>


@endsection


@push('body')
    <script type="text/javascript">
        $('.nav-item').removeClass('active');
        $('#concepts').addClass('active');
    </script>
@endpush
