<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Concept;
use App\Argument;
use App\Philosopher;
use App\Work;

class ArgumentController extends Controller
{
    public function all()
    {

        $arguments = Argument::all();

        return view('argument.all')->with([
            'arguments' => $arguments
        ]);
    }

    public function single($argument_id)
    {
        $selected_argument = Argument::find($argument_id);

        return view('argument.single')->with([
            'selected_argument' => $selected_argument
        ]);
    }

    public function create()
    {
        $philosophers = Philosopher::all();
        $works        = Work::all();

        return view('argument.create')->with([
            'philosophers' => $philosophers,
            'works'        => $works
        ]);

    }

    public function store(Request $request)
    {

        $argument             = new Argument();
        $argument->title      = $request->input('title');
        $argument->assumption = $request->input('assumption');
        $argument->conclusion = $request->input('conclusion');

        if ($request->input('philosopher_new') != '') {

            $philosopher       = new Philosopher();
            $philosopher->name = $request->input('philosopher_new');
            $philosopher->save();
            $philosopher_id = $philosopher->id;
        } else {
            $philosopher_id = $request->input('philosopher');

            if ($request->input('philosopher') == '') {
                //TODO pass message: Either choose a philosopher or enter a new one
            }
        }
        $argument->philosopher_id = $philosopher_id;

        if ($request->input('work_new') != '') {
            $work                 = new Work();
            $work->title          = $request->input('work_new');
            $work->philosopher_id = $philosopher_id;
            $work->save();
            $argument->work_id = $work->id;
        } else {
            $argument->work_id = $request->input('work');
        }
        $argument->save();

        return redirect('/argument/all')->with('alert', 'The argument was added.');
    }

    public function edit($argument_id)
    {
        $argument = Argument::find($argument_id);

        $philosophers = Philosopher::all();
        $works        = Work::all();

        return view('argument.edit')->with([
            'philosophers' => $philosophers,
            'works'        => $works,
            'argument'     => $argument
        ]);
    }

    public function update(Request $request, $argument_id)
    {
        $argument             = Argument::find($argument_id);
        $argument->title      = $request->input('title');
        $argument->assumption = $request->input('assumption');
        $argument->conclusion = $request->input('conclusion');

        if ($request->input('philosopher_new') != '') {

            $philosopher       = new Philosopher();
            $philosopher->name = $request->input('philosopher_new');
            $philosopher->save();
            $philosopher_id = $philosopher->id;
        } else {
            $philosopher_id = $request->input('philosopher');

            if ($request->input('philosopher') == '') {
                //TODO pass message: Either choose a philosopher or enter a new one
            }
        }
        $argument->philosopher_id = $philosopher_id;

        if ($request->input('work_new') != '') {
            $work                 = new Work();
            $work->title          = $request->input('work_new');
            $work->philosopher_id = $philosopher_id;
            $work->save();
            $argument->work_id = $work->id;
        } else {
            $argument->work_id = $request->input('work');
        }
        $argument->save();

        return redirect('/argument/all')->with('alert', 'The argument was edited.');

    }

}
