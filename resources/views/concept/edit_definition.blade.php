@extends('layouts.master')


@section('title')
    Add a definition
@endsection

@section('current_position')
    Concepts > Edit a definition
@endsection

@section('content')

    <div class="container">
        <div class="row">

            <form method='POST' action='/concept/definition/update/{{$definition->id}}'>

                {{ csrf_field() }}

                <small class='form-text text-muted'>* Required fields</small>
                <hr>
                <div class="form-group">
                    <label for="definition">* Definition:</label>
                    <textarea class="form-control" name="definition" id="definition" rows="3">{{ old('definition', $definition->definition) }}</textarea>
                    @include('modules.error-field', ['fieldName' => 'definition'])
                </div>

                @include('form.pulldown-philosopher-work', [
                    'entry' => $definition
                ])

                @include('modules.error-field', ['fieldName' => 'philosopher_new'])

                @include('form.new-philosopher-work')

                <button type="submit" class="btn btn-primary">Save Definition</button>
                <br><br>
            </form>

        </div>
    </div>

@endsection

@push('body')
    <script src="/js/DisplayPhilosopherWorkInput.js"></script>
@endpush
