<div class='form-group'>* Philosopher Pulldown
    <select class='form-control' name='philosopher' id='philosopher'>
        <option value="">- Select a philosopher -</option>
        @foreach ($philosophers as $philosopher)
            <option value="{{$philosopher->id}}"
                @if ($entry != 'none')
                    {{($philosopher->id == $entry->philosopher_id) ? 'selected' : ''}}
                @endif
            >
                {{$philosopher->name}}
            </option>
        @endforeach
    </select>
</div>
<div class='form-group'> Works Pulldown
    <select class='form-control' name='work' id='work'>
        <option value="">- Select a work -</option>
        @foreach ($works as $work)
            <option value="{{$work->id}}"
                @if ($entry != 'none')
                    {{($work->id == $entry->work_id) ? 'selected' : ''}}
                @endif
            >
                {{$work->title}}
            </option>
        @endforeach
    </select>
</div>