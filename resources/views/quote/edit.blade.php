@extends('layouts.master')


@section('title')
    Edit a quote
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
                    <textarea class="form-control" name="quote" id="quote" rows="3">{{ old('quote', $quote->quote) }}</textarea>
                    @include('modules.error-field', ['fieldName' => 'title'])
                </div>


                @include('form.check-language', [
                    'entry' => $quote
                ])

                @include('form.pulldown-philosopher-work', [
                    'entry' => $quote
                ])

                @include('form.new-philosopher-work')

                <button type="submit" class="btn btn-primary">Save Quote</button>
                <br><br>
            </form>

        </div>
    </div>


@endsection




@push('body')
    <script type="text/javascript">

        $(document).ready(function () {
            $("#philosopher_work_input").hide();
            $("input[name='want']").click(function () {
                displayPhilosopherWorkInput();
            });
        });

        function displayPhilosopherWorkInput() {
            if ($("input[name='want']:checked").val() == 'yes') {
                $('#philosopher_work_input').fadeIn('slow');
            } else {
                $('#philosopher_work_input').fadeOut('slow');
            }
        }
    </script>
@endpush
