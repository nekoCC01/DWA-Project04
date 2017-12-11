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

    //show all concepts
    public function all()
    {
        $concepts = Concept::all();
        $showForm = false;

        return view('concept.all')->with([
            'concepts' => $concepts,
            'showForm' => $showForm
        ]);
    }

    //show a single concept, with its definitions
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

    //create new concept --> additional form in all-page
    public function create()
    {
        $concepts = Concept::all();
        $showForm = true;

        return view('concept.all')->with([
            'concepts' => $concepts,
            'showForm' => $showForm
        ]);
    }

    //store concept
    public function store(Request $request)
    {

        $this->validate($request, [
            'concept' => 'required'
        ]);

        $concept          = new Concept();
        $concept->concept = $request->input('concept');

        $concept->save();

        return redirect('/concept/all')->with('alert', 'The concept was added.');
    }

    //create new definition for a concept (from single view)
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

    //store definition
    public function store_definition(Request $request)
    {
        $this->validate($request, [
            'definition'      => 'required',
            'philosopher_new' => 'required_without:philosopher'
        ]);

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


    //edit a concept
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

    //update a concept
    public function update(Request $request, $concept_id)
    {
        $this->validate($request, [
            'concept' => 'required'
        ]);

        $concept          = Concept::find($concept_id);
        $concept->concept = $request->input('concept');

        $concept->save();

        $redirect_path = '/concept/single/' . $concept_id;

        return redirect($redirect_path)->with('alert', 'The concept was edited.');
    }

    //edit definition
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

    //update definition
    public function update_definition(Request $request, $definition_id)
    {
        $this->validate($request, [
            'definition'      => 'required',
            'philosopher_new' => 'required_without:philosopher'
        ]);

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

    //add related quote
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

    //store quote
    public function store_quote(Request $request, $concept_id)
    {
        $this->validate($request, [
            'quote'           => 'required'
        ]);

        DB::table('concept_quote')->insert([
            'quote_id'   => $request->input('quote'),
            'concept_id' => $concept_id
        ]);

        $redirect_path = '/concept/single/' . $concept_id;

        return redirect($redirect_path)->with('alert', 'The concept has been added.');
    }

    //add related argument
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

    //store argument
    public function store_argument(Request $request, $concept_id)
    {
        $this->validate($request, [
            'argument'           => 'required'
        ]);

        DB::table('argument_concept')->insert([
            'argument_id' => $request->input('argument'),
            'concept_id'  => $concept_id
        ]);

        $redirect_path = '/concept/single/' . $concept_id;

        return redirect($redirect_path)->with('alert', 'The argument has been added.');
    }


    //delete concept --> confirmation page
    public function delete($concept_id)
    {
        $concept = Concept::find($concept_id);

        return view('/concept/delete')->with([
            'concept'     => $concept,
            'previousUrl' => url()->previous() == url()->current() ? '/concept/all' : url()->previous()
        ]);

    }

    //final delete,, with all definitions, and all related quotes and arguments (pivot tables)
    public function destroy($concept_id)
    {
        Definition::where('concept_id', $concept_id)->delete();

        $concept = Concept::find($concept_id);
        $concept->quotes()->detach();
        $concept->arguments()->detach();
        $concept->delete();

        return redirect('/concept/all')->with('alert', 'The concept has been deleted.');

    }

    //delete a definition
    public function delete_definition($concept_id, $definition_id)
    {
        $concept    = Concept::find($concept_id);
        $definition = Definition::find($definition_id);

        return view('/concept/delete_definition')->with([
            'concept'     => $concept,
            'definition'  => $definition,
            'previousUrl' => url()->previous() == url()->current() ? '/concept/all' : url()->previous()
        ]);

    }

    //final delete of definition
    public function destroy_definition($concept_id, $definition_id)
    {
        $definition = Definition::find($definition_id);
        $definition->delete();

        $redirect_path = '/concept/single/' . $concept_id;

        return redirect($redirect_path)->with('alert', 'The definition has been deleted.');

    }

    //unlink related entries
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
