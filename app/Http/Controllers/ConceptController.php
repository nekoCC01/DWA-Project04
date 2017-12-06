<?php

namespace App\Http\Controllers;

use App\Definition;
use Illuminate\Http\Request;
use App\Concept;
use App\Argument;
use App\Philosopher;
use App\Work;
use App\Quote;
use DB;
use App\Traits\CustomFormActions;

class ConceptController extends Controller
{

    use CustomFormActions;

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

        $showQuoteForm    = false;
        $showArgumentForm = false;

        return view('concept.single')->with([
            'selected_concept' => $selected_concept,
            'edit_concept'     => $edit_concept,
            'showQuoteForm'    => $showQuoteForm,
            'showArgumentForm' => $showArgumentForm
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

        $work        = new Work();
        $philosopher = new Philosopher();
        $this->store_new_philosopher_work($request, $philosopher, $work, $definition);

        $definition->save();

        $redirect_path = '/concept/single/' . $request->input('concept_id');

        return redirect($redirect_path)->with('alert', 'The definition was added.');
    }


    public function edit($concept_id)
    {
        $selected_concept = Concept::find($concept_id);
        $edit_concept     = true;
        $showQuoteForm    = false;
        $showArgumentForm = false;

        return view('concept.single')->with([
            'selected_concept' => $selected_concept,
            'edit_concept'     => $edit_concept,
            'showQuoteForm'    => $showQuoteForm,
            'showArgumentForm' => $showArgumentForm
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

        $work        = new Work();
        $philosopher = new Philosopher();
        $this->store_new_philosopher_work($request, $philosopher, $work, $definition);

        $definition->save();

        $redirect_path = '/concept/single/' . $definition->concept_id;

        return redirect($redirect_path)->with('alert', 'The definition was edited.');

    }

    public function add_quote($concept_id)
    {

        $selected_concept = Concept::find($concept_id);
        $edit_concept     = false;

        $showQuoteForm    = true;
        $showArgumentForm = false;

        $quotes = Quote::all();

        return view('concept.single')->with([
            'selected_concept' => $selected_concept,
            'edit_concept'     => $edit_concept,
            'showQuoteForm'    => $showQuoteForm,
            'showArgumentForm' => $showArgumentForm,
            'quotes'           => $quotes
        ]);
    }

    public function store_quote(Request $request, $concept_id)
    {
        DB::table('concept_quote')->insert([
            'quote_id'   => $request->input('quote'),
            'concept_id' => $concept_id
        ]);

        $redirect_path = '/concept/single/' . $concept_id;

        return redirect($redirect_path)->with('alert', 'The concept has been added.');
    }

    public function add_argument($concept_id)
    {

        $selected_concept = Concept::find($concept_id);
        $edit_concept     = false;

        $showQuoteForm    = false;
        $showArgumentForm = true;

        $arguments = Argument::all();

        return view('concept.single')->with([
            'selected_concept' => $selected_concept,
            'edit_concept'     => $edit_concept,
            'showQuoteForm'    => $showQuoteForm,
            'showArgumentForm' => $showArgumentForm,
            'arguments'        => $arguments
        ]);
    }

    public function store_argument(Request $request, $concept_id)
    {
        DB::table('argument_concept')->insert([
            'argument_id' => $request->input('argument'),
            'concept_id'  => $concept_id
        ]);

        $redirect_path = '/concept/single/' . $concept_id;

        return redirect($redirect_path)->with('alert', 'The argument has been added.');
    }

    public function delete($concept_id)
    {
        Definition::where('concept_id', $concept_id)->delete();
        Concept::find($concept_id)->delete();

        DB::table('concept_quote')->where('concept_id', $concept_id)->delete();
        DB::table('argument_concept')->where('concept_id', $concept_id)->delete();

        return redirect('/concept/all')->with('alert', 'The concept has been deleted.');

    }

    public function delete_definition($concept_id, $definition_id)
    {
        $definition = Definition::find($definition_id);
        $definition->delete();

        $redirect_path = '/concept/single/' . $concept_id;

        return redirect($redirect_path)->with('alert', 'The definition has been deleted.');

    }

    public function unlink($type, $concept_id, $related_id)
    {

        if ($type == 'argument') {
            $table = 'argument_concept';
        } elseif ($type == 'quote') {
            $table = 'concept_quote';
        }

        $related_id_fieldname = $type . "_id";
        DB::table($table)->where('concept_id', $concept_id)->where($related_id_fieldname, $related_id)->delete();

        $redirect_path = '/concept/single/' . $concept_id;
        $message       = 'The ' . $type . ' has been unlinked.';

        return redirect($redirect_path)->with('alert', $message);
    }

}
