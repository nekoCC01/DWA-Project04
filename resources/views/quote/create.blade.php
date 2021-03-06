@extends('layouts.master')


@section('title')
    Add a quote
@endsection

@section('current_position')
    Quotes > Add a quote
@endsection

@section('content')

    <div class="container">
        <div class="row">

            <form method='POST' action='/quote'>

                {{ csrf_field() }}

                <small class='form-text text-muted'>* Required fields</small>

                <hr>
                <div class="form-group">
                    <label for="quote">* Quote: </label>
                    <textarea class="form-control" name="quote" id="quote" rows="3">{{ old('quote', '') }}</textarea>
                    @include('modules.error-field', ['fieldName' => 'quote'])
                </div>

                @include('form.check-language', [
                    'entry' => 'none'
                ])

                @include('form.pulldown-philosopher-work', [
                    'entry' => 'none'
                ])

                @include('modules.error-field', ['fieldName' => 'philosopher_new'])

                @include('form.new-philosopher-work')

                <button type="submit" class="btn btn-primary">Add Quote</button>
                <br><br>
            </form>

        </div>
    </div>


@endsection

@push('body')
    <script src="/js/DisplayPhilosopherWorkInput.js"></script>
@endpush
