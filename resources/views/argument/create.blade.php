@extends('layouts.master')


@section('title')
    Add an arguments
@endsection


@section('content')

    <div class="container">
        <div class="row">

            <form method='POST' action='/argument'>

                {{ csrf_field() }}

                <small class='form-text text-muted'>* Required fields</small>

                <div class='form-group'>
                    <label for='title'>* Title</label>
                    <input type='text' class='form-control' name='title' id='title' placeholder='Enter Title'
                           value='{{ old('title', '') }}'>
                    @include('modules.error-field', ['fieldName' => 'title'])
                </div>

                <div class='form-group'>
                    <label for='assumption'>* Assumption</label>
                    <input type='text' class='form-control' name='assumption' id='assumption' placeholder='Enter Assumption'
                           value='{{ old('assumption', '') }}'>
                    @include('modules.error-field', ['fieldName' => 'assumption'])
                </div>

                <div class='form-group'>
                    <label for='conclusion'>* Conclusion</label>
                    <input type='text' class='form-control' name='conclusion' id='conclusion' placeholder='Enter Conclusion'
                           value='{{ old('conclusion', '') }}'>
                    @include('modules.error-field', ['fieldName' => 'conclusion'])
                </div>

                <!--TODO Das Zusatz-Fieldset evtl auslagern als Sub-View -->
                <div class='form-group'> Philosopher Pulldown
                    <select class='form-control' name='philosopher' id='philosopher'>
                        <option value="">- Select a philosopher -</option>
                        @foreach ($philosophers as $philosopher)
                            <option value="{{$philosopher->id}}">{{$philosopher->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class='form-group'> Works Pulldown
                    <select class='form-control' name='work' id='work'>
                        <option value="">- Select a work -</option>
                        @foreach ($works as $work)
                            <option value="{{$work->id}}">{{$work->title}}</option>
                        @endforeach
                    </select>
                </div>

                <hr>
                <div> Do you want to enter a new philosopher or a work?
                    <br/>
                    <input class="form-check-input" type="radio" name="want" id="pd_yes" value="yes"/>
                    <label class="form-check-label" for="pd_yes">Yes</label>
                    <br/>
                    <input class="form-check-input" type="radio" name="want" id="pd_no" value="no"/>
                    <label class="form-check-label" for="pd_no">No</label>
                </div>
                <fieldset id="philosopher_work_input">
                    <div class="form-group">
                        <label for="philosopher">Philosopher: </label>
                        <input class='form-control' type="text" name="philosopher_new" id="philosopher_new">
                    </div>
                    <div class="form-group">
                        <label for="philosopher">Work: </label>
                        <input class='form-control' type="text" name="work_new" id="work_new">
                    </div>

                </fieldset>
                <hr>

                <button type="submit" class="btn btn-primary">Add Argument</button>
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
