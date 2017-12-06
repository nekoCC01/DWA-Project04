@extends('layouts.master')


@section('title')
    Edit an argument
@endsection

@section('current_position')
    Arguments > Edit an argument
@endsection

@section('content')

    <div class="container">
        <div class="row">

            <form method='POST' action='/argument/update/{{$argument->id}}'>

                {{ csrf_field() }}

                <small class='form-text text-muted'>* Required fields</small>

                <div class='form-group'>
                    <label for='title'>* Title</label>
                    <input type='text' class='form-control' name='title' id='title'
                           value='{{ old('title', $argument->title) }}'>
                    @include('modules.error-field', ['fieldName' => 'title'])
                </div>

                <div class="form-group">
                    <label for="assumption">* Assumption:</label>
                    <textarea class="form-control" name="assumption" id="assumption" rows="3">{{ old('assumption', $argument->assumption) }}</textarea>
                    @include('modules.error-field', ['fieldName' => 'assumption'])
                </div>

                <div class="form-group">
                    <label for="conclusion">* Conclusion:</label>
                    <textarea class="form-control" name="conclusion" id="conclusion" rows="3">{{ old('conclusion', $argument->conclusion) }}</textarea>
                </div>

                @include('form.pulldown-philosopher-work', [
                    'entry' => $argument
                ])

                @include('form.new-philosopher-work')

                <button type="submit" class="btn btn-primary">Save Argument</button>
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
