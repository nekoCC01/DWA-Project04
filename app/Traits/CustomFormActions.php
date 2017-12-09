<?php

namespace App\Traits;

trait CustomFormActions
{
    public function store_new_philosopher_work($request, $philosopher, $work, $entry)
    {
        if ($request->input('philosopher_new') != '') {
            $philosopher->name = $request->input('philosopher_new');
            $philosopher->save();
            $philosopher_id = $philosopher->id;
        } else {
            $philosopher_id = $request->input('philosopher');
        }
        $entry->philosopher_id = $philosopher_id;

        if ($request->input('work_new') != '') {
            $work->title          = $request->input('work_new');
            $work->philosopher_id = $philosopher_id;
            $work->save();
            $entry->work_id = $work->id;
        } else {
            $entry->work_id = $request->input('work');
        }
    }
}

