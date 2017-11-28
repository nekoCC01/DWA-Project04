<?php

namespace App\Http\Controllers;

use App\Definition;
use Illuminate\Http\Request;
use App\Concept;
use App\Argument;
use App\Philosopher;
use App\Work;

class ConceptController extends Controller
{
    public function all()
    {

        $concepts = Concept::all();
        $showForm = false;

        return view('concept.all')->with([
            'concepts' => $concepts,
            'showForm' => $showForm
        ]);
    }

    public function single($concept_id)
    {
        $selected_concept = Concept::find($concept_id);
        $edit_concept     = false;

        return view('concept.single')->with([
            'selected_concept' => $selected_concept,
            'edit_concept'     => $edit_concept
        ]);
    }

    public function create()
    {
        $concepts = Concept::all();
        $showForm = true;

        return view('concept.all')->with([
            'concepts' => $concepts,
            'showForm' => $showForm
        ]);
    }

    public function store(Request $request)
    {

        $concept          = new Concept();
        $concept->concept = $request->input('concept');

        $concept->save();

        return redirect('/concept/all')->with('alert', 'The concept was added.');
    }

    public function create_definition($concept_id)
    {
        $philosophers = Philosopher::all();
        $works        = Work::all();

        return view('concept.create_definition')->with([
            'philosophers' => $philosophers,
            'works'        => $works,
            'concept_id'   => $concept_id
        ]);

    }

    public function store_definition(Request $request)
    {

        $definition             = new Definition();
        $definition->definition = $request->input('definition');
        $definition->concept_id = $request->input('concept_id');

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
        $definition->philosopher_id = $philosopher_id;

        if ($request->input('work_new') != '') {
            $work                 = new Work();
            $work->title          = $request->input('work_new');
            $work->philosopher_id = $philosopher_id;
            $work->save();
            $definition->work_id = $work->id;
        } else {
            $definition->work_id = $request->input('work');
        }
        $definition->save();

        $redirect_path = '/concept/single/' . $request->input('concept_id');

        return redirect($redirect_path)->with('alert', 'The definition was added.');
    }


    public function edit($concept_id)
    {
        $selected_concept = Concept::find($concept_id);
        $edit_concept     = true;

        return view('concept.single')->with([
            'selected_concept' => $selected_concept,
            'edit_concept'     => $edit_concept
        ]);
    }

    public function update(Request $request, $concept_id)
    {
        $concept          = Concept::find($concept_id);
        $concept->concept = $request->input('concept');

        $concept->save();

        $redirect_path = '/concept/single/' . $concept_id;

        return redirect($redirect_path)->with('alert', 'The concept was edited.');
    }

    public function edit_definition($definition_id)
    {
        $definition = Definition::find($definition_id);

        $philosophers = Philosopher::all();
        $works        = Work::all();

        return view('concept.edit_definition')->with([
            'philosophers' => $philosophers,
            'works'        => $works,
            'definition'   => $definition
        ]);
    }

    public function update_definition(Request $request, $definition_id)
    {

        $definition             = Definition::find($definition_id);
        $definition->definition = $request->input('definition');
        $definition->concept_id = $definition->concept_id;

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
        $definition->philosopher_id = $philosopher_id;

        if ($request->input('work_new') != '') {
            $work                 = new Work();
            $work->title          = $request->input('work_new');
            $work->philosopher_id = $philosopher_id;
            $work->save();
            $definition->work_id = $work->id;
        } else {
            $definition->work_id = $request->input('work');
        }
        $definition->save();

        $redirect_path = '/concept/single/' . $definition->concept_id;

        return redirect($redirect_path)->with('alert', 'The definition was edited.');

    }

}
