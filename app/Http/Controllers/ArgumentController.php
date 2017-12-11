<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Concept;
use App\Argument;
use App\Philosopher;
use App\Work;
use App\Quote;
use DB;
use App\Traits\CustomFormActions;

class ArgumentController extends Controller
{
    use CustomFormActions;

    //Show all arguments
    public function all()
    {
        $arguments = Argument::all();

        return view('argument.all')->with([
            'arguments' => $arguments
        ]);
    }

    //Show a single argument
    public function single($argument_id)
    {
        $selected_argument = Argument::find($argument_id);

        $showConceptForm = false;
        $showQuoteForm   = false;

        return view('argument.single')->with([
            'selected_argument' => $selected_argument,
            'showConceptForm'   => $showConceptForm,
            'showQuoteForm'     => $showQuoteForm
        ]);
    }

    //create a new argument
    public function create()
    {
        $philosophers = Philosopher::all();
        $works        = Work::all();

        return view('argument.create')->with([
            'philosophers' => $philosophers,
            'works'        => $works
        ]);

    }

    //store the newly created argument
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'           => 'required',
            'assumption'      => 'required',
            'conclusion'      => 'required',
            'philosopher_new' => 'required_without:philosopher'
        ]);

        $argument             = new Argument();
        $argument->title      = $request->input('title');
        $argument->assumption = $request->input('assumption');
        $argument->conclusion = $request->input('conclusion');

        $work        = new Work();
        $philosopher = new Philosopher();
        $this->store_new_philosopher_work($request, $philosopher, $work, $argument);

        $argument->save();

        return redirect('/argument/all')->with('alert', 'The argument was added.');
    }

    //edit an argument
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

    //update the edited argument
    public function update(Request $request, $argument_id)
    {
        $this->validate($request, [
            'title'           => 'required',
            'assumption'      => 'required',
            'conclusion'      => 'required',
            'philosopher_new' => 'required_without:philosopher'
        ]);

        $argument             = Argument::find($argument_id);
        $argument->title      = $request->input('title');
        $argument->assumption = $request->input('assumption');
        $argument->conclusion = $request->input('conclusion');

        $work        = new Work();
        $philosopher = new Philosopher();
        $this->store_new_philosopher_work($request, $philosopher, $work, $argument);

        $argument->save();

        return redirect('/argument/all')->with('alert', 'The argument was edited.');

    }

    //add a related concept
    public function add_concept($argument_id)
    {
        $selected_argument = Argument::find($argument_id);

        $showConceptForm = true;
        $showQuoteForm   = false;

        $concepts = Concept::all();

        return view('argument.single')->with([
            'selected_argument' => $selected_argument,
            'showConceptForm'   => $showConceptForm,
            'showQuoteForm'     => $showQuoteForm,
            'concepts'          => $concepts
        ]);
    }

    //store the concept
    public function store_concept(Request $request, $argument_id)
    {
        $this->validate($request, [
            'concept'           => 'required'
        ]);

        DB::table('argument_concept')->insert([
            'argument_id' => $argument_id,
            'concept_id'  => $request->input('concept')
        ]);

        $redirect_path = '/argument/single/' . $argument_id;

        return redirect($redirect_path)->with('alert', 'The concept has been added.');

    }

    //add a related quote
    public function add_quote($argument_id)
    {
        $selected_argument = Argument::find($argument_id);

        $showConceptForm = false;
        $showQuoteForm   = true;

        $quotes = Quote::all();

        return view('argument.single')->with([
            'selected_argument' => $selected_argument,
            'showConceptForm'   => $showConceptForm,
            'showQuoteForm'     => $showQuoteForm,
            'quotes'            => $quotes
        ]);
    }

    //store the quote
    public function store_quote(Request $request, $argument_id)
    {
        $this->validate($request, [
            'quote'           => 'required'
        ]);

        DB::table('argument_quote')->insert([
            'quote_id'    => $request->input('quote'),
            'argument_id' => $argument_id
        ]);

        $redirect_path = '/argument/single/' . $argument_id;

        return redirect($redirect_path)->with('alert', 'The quote has been added.');
    }


    //delete an argument --> confirmation page
    public function delete($argument_id)
    {
        $argument = Argument::find($argument_id);

        return view('/argument/delete')->with([
            'argument'    => $argument,
            'previousUrl' => url()->previous() == url()->current() ? '/argument/all' : url()->previous()
        ]);

    }

    //final delete, with all related concepts and quotes
    public function destroy($argument_id)
    {
        $argument = Argument::find($argument_id);
        $argument->quotes()->detach();
        $argument->concepts()->detach();
        $argument->delete();

        return redirect('/argument/all')->with('alert', 'The argument has been deleted.');

    }

    //unlink related concepts or quotes
    public function unlink($type, $argument_id, $related_id)
    {
        $table                = "argument_" . $type;
        $related_id_fieldname = $type . "_id";
        DB::table($table)->where('argument_id', $argument_id)->where($related_id_fieldname, $related_id)->delete();

        $redirect_path = '/argument/single/' . $argument_id;
        $message       = 'The ' . $type . ' has been unlinked.';

        return redirect($redirect_path)->with('alert', $message);
    }

}
