@extends('layouts.master')


@section('title')
    Add a definition
@endsection

@section('current_position')
    Concepts > Create a definition
@endsection

@section('content')

    <div class="container">
        <div class="row">

            <form method='POST' action='/concept/definition'>

                {{ csrf_field() }}

                <small class='form-text text-muted'>* Required fields</small>

                <hr>
                <div class="form-group">
                    <label for="definition">* Definition:</label>
                    <textarea class="form-control" name="definition" id="definition" rows="3">{{ old('definition','') }}</textarea>
                    @include('modules.error-field', ['fieldName' => 'definition'])
                </div>

                @include('form.pulldown-philosopher-work', [
                    'entry' => 'none'
                ])

                @include('modules.error-field', ['fieldName' => 'philosopher_new'])

                @include('form.new-philosopher-work')

                <input type="hidden" name="concept_id" value="{{$concept_id}}">
                <button type="submit" class="btn btn-primary">Add Definition</button>
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
