<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quote;
use App\Philosopher;
use App\Work;
use App\Concept;
use App\Argument;
use DB;
use App\Traits\CustomFormActions;

class QuoteController extends Controller
{
    use CustomFormActions;

    //Show all quotes
    public function all()
    {
        $quotes       = Quote::all();
        $random_quote = $quotes->random();

        return view('quote.all')->with([
            'quotes'       => $quotes,
            'random_quote' => $random_quote
        ]);

    }

    //Home Screen, with random quote
    public function welcome()
    {
        $quotes       = Quote::all();
        $random_quote = $quotes->random();

        return view('welcome')->with([
            'random_quote' => $random_quote
        ]);
    }

    //Detail view for a single quote
    public function single($quote_id)
    {
        $selected_quote = Quote::find($quote_id);

        $showConceptForm  = false;
        $showArgumentForm = false;

        return view('quote.single')->with([
            'selected_quote'   => $selected_quote,
            'showConceptForm'  => $showConceptForm,
            'showArgumentForm' => $showArgumentForm
        ]);
    }

    //Create a new quote
    public function create()
    {
        $philosophers = Philosopher::all();
        $works        = Work::all();

        if (!empty($errors))
        {
            dump($errors);
        }


        return view('quote.create')->with([
            'philosophers' => $philosophers,
            'works'        => $works
        ]);

    }

    //Store the new quote
    public function store(Request $request)
    {
        $this->validate($request, [
            'quote'           => 'required',
            'philosopher_new' => 'required_without:philosopher'
        ]);

        $quote           = new Quote();
        $quote->quote    = $request->input('quote');
        $quote->language = $request->input('language');

        $work        = new Work();
        $philosopher = new Philosopher();
        $this->store_new_philosopher_work($request, $philosopher, $work, $quote);

        $quote->save();

        return redirect('/quote/all')->with('alert', 'The quote was added.');
    }

    //Edit a quote
    public function edit($quote_id)
    {
        $quote = Quote::find($quote_id);

        $philosophers = Philosopher::all();
        $works        = Work::all();

        return view('quote.edit')->with([
            'philosophers' => $philosophers,
            'works'        => $works,
            'quote'        => $quote
        ]);

    }

    //Update the quote edited
    public function update(Request $request, $quote_id)
    {
        $this->validate($request,[
            'quote' => 'required',
            'philosopher_new' => 'required_without:philosopher'
        ]);

        $quote           = Quote::find($quote_id);
        $quote->quote    = $request->input('quote');
        $quote->language = $request->input('language');


        $work        = new Work();
        $philosopher = new Philosopher();
        $this->store_new_philosopher_work($request, $philosopher, $work, $quote);

        $quote->save();

        return redirect('/quote/all')->with('alert', 'The quote was edited.');
    }

    //Add a concept to the quote (appears under "Related concepts" in the Single view)
    public function add_concept($quote_id)
    {
        $selected_quote = Quote::find($quote_id);

        $showConceptForm  = true;
        $showArgumentForm = false;

        $concepts = Concept::all();

        return view('quote.single')->with([
            'selected_quote'   => $selected_quote,
            'showConceptForm'  => $showConceptForm,
            'showArgumentForm' => $showArgumentForm,
            'concepts'         => $concepts
        ]);
    }

    //Store the added concept
    public function store_concept(Request $request, $quote_id)
    {
        $this->validate($request, [
            'concept'           => 'required'
        ]);

        DB::table('concept_quote')->insert([
            'quote_id'   => $quote_id,
            'concept_id' => $request->input('concept')
        ]);

        $redirect_path = '/quote/single/' . $quote_id;

        return redirect($redirect_path)->with('alert', 'The concept has been added.');

    }

    //Add an argument to the quote (appears under "Related arguments" in the Single view)
    public function add_argument($quote_id)
    {
        $selected_quote = Quote::find($quote_id);

        $showConceptForm  = false;
        $showArgumentForm = true;

        $arguments = Argument::all();

        return view('quote.single')->with([
            'selected_quote'   => $selected_quote,
            'showConceptForm'  => $showConceptForm,
            'showArgumentForm' => $showArgumentForm,
            'arguments'        => $arguments
        ]);

    }

    //Store the argument
    public function store_argument(Request $request, $quote_id)
    {
        $this->validate($request, [
            'argument'           => 'required'
        ]);

        DB::table('argument_quote')->insert([
            'quote_id'    => $quote_id,
            'argument_id' => $request->input('argument')
        ]);

        $redirect_path = '/quote/single/' . $quote_id;

        return redirect($redirect_path)->with('alert', 'The argument has been added.');
    }

    //Delete a quote --> return a confirmation view
    public function delete($quote_id)
    {
        $quote = Quote::find($quote_id);

        return view('/quote/delete')->with([
            'quote' => $quote,
            'previousUrl' => url()->previous() == url()->current() ? '/quote/all' : url()->previous()
        ]);

    }

    //delete the quote in the DB, with all its relations
    public function destroy($quote_id)
    {
        $quote = Quote::find($quote_id);

        $quote->arguments()->detach();
        $quote->concepts()->detach();
        $quote->delete();

        return redirect('/quote/all')->with('alert', 'The quote has been deleted.');

    }

    //unlink a related concept or argument
    public function unlink($type, $quote_id, $related_id)
    {
        $table                = $type . "_quote";
        $related_id_fieldname = $type . "_id";
        DB::table($table)->where('quote_id', $quote_id)->where($related_id_fieldname, $related_id)->delete();

        $redirect_path = '/quote/single/' . $quote_id;
        $message       = 'The ' . $type . ' has been unlinked.';

        return redirect($redirect_path)->with('alert', $message);
    }

}
