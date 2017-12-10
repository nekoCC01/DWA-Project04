@extends('layouts.master')


@section('title')
    Add an argument
@endsection

@section('current_position')
    Arguments > Add an argument
@endsection

@section('content')

    <div class="container">
        <div class="row">

            <form method='POST' action='/argument'>

                {{ csrf_field() }}

                <small class='form-text text-muted'>* Required fields</small>
                <hr>

                <div class='form-group'>
                    <label for='title'>* Title</label>
                    <input type='text' class='form-control' name='title' id='title'
                           value='{{ old('title'),'' }}'>
                    @include('modules.error-field', ['fieldName' => 'title'])
                </div>

                <div class="form-group">
                    <label for="assumption">* Assumption:</label>
                    <textarea class="form-control" name="assumption" id="assumption" rows="3">{{ old('assumption'),'' }}</textarea>
                    @include('modules.error-field', ['fieldName' => 'assumption'])
                </div>

                <div class="form-group">
                    <label for="conclusion">* Conclusion:</label>
                    <textarea class="form-control" name="conclusion" id="conclusion" rows="3">{{ old('conclusion'),'' }}</textarea>
                    @include('modules.error-field', ['fieldName' => 'conclusion'])
                </div>

                @include('form.pulldown-philosopher-work', [
                    'entry' => 'none'
                ])

                @include('modules.error-field', ['fieldName' => 'philosopher_new'])

                @include('form.new-philosopher-work')

                <button type="submit" class="btn btn-primary">Add Argument</button>
                <br><br>
            </form>

        </div>
    </div>

@endsection




@push('body')
    <script>

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
