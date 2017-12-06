<div class='form-group'>* Philosopher Pulldown
    <select class='form-control' name='philosopher' id='philosopher'>
        <option value="">- Select a philosopher -</option>
        @foreach ($philosophers as $philosopher)
        <option value="{{$philosopher->id}}" {{($philosopher->id == $quote->philosopher_id) ? 'selected' : ''}}>{{$philosopher->name}}</option>
        @endforeach
    </select>
</div>
<div class='form-group'> Works Pulldown
    <select class='form-control' name='work' id='work'>
        <option value="">- Select a work -</option>
        @foreach ($works as $work)
        <option value="{{$work->id}}" {{($work->id == $quote->work_id) ? 'selected' : ''}}>{{$work->title}}</option>
        @endforeach
    </select>
</div>