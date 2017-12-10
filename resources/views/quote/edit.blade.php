@extends('layouts.master')


@section('title')
    Edit a quote
@endsection

@section('current_position')
    Quotes > Edit a quote
@endsection

@section('content')

    <div class="container">
        <div class="row">

            <form method='POST' action='/quote/update/{{$quote->id}}'>

                {{ csrf_field() }}

                <small class='form-text text-muted'>* Required fields</small>
                <hr>

                <div class="form-group">
                    <label for="quote">* Quote: </label>
                    <textarea class="form-control" name="quote" id="quote"
                              rows="3">{{ old('quote', $quote->quote) }}</textarea>
                    @include('modules.error-field', ['fieldName' => 'quote'])
                </div>


                @include('form.check-language', [
                    'entry' => $quote
                ])

                @include('form.pulldown-philosopher-work', [
                    'entry' => $quote
                ])

                @include('modules.error-field', ['fieldName' => 'philosopher_new'])

                @include('form.new-philosopher-work')

                <button type="submit" class="btn btn-primary">Save Quote</button>
                <br><br>
            </form>

        </div>
    </div>


@endsection


@push('body')
    <script src="/js/DisplayPhilosopherWorkInput.js"></script>
@endpush
