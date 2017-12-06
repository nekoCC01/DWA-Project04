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

    public function all()
    {

        $quotes       = Quote::all();
        $random_quote = $quotes->random();

        return view('quote.all')->with([
            'quotes'       => $quotes,
            'random_quote' => $random_quote
        ]);

    }

    public function welcome()
    {
        $quotes       = Quote::all();
        $random_quote = $quotes->random();

        return view('welcome')->with([
            'random_quote' => $random_quote
        ]);
    }

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

    public function create()
    {
        $philosophers = Philosopher::all();
        $works        = Work::all();

        return view('quote.create')->with([
            'philosophers' => $philosophers,
            'works'        => $works
        ]);

    }

    public function store(Request $request)
    {

        $quote           = new Quote();
        $quote->quote    = $request->input('quote');
        $quote->language = $request->input('language');

        $work        = new Work();
        $philosopher = new Philosopher();
        $this->store_new_philosopher_work($request, $philosopher, $work, $quote);

        $quote->save();

        return redirect('/quote/all')->with('alert', 'The quote was added.');
    }

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

    public function update(Request $request, $quote_id)
    {
        $quote           = Quote::find($quote_id);
        $quote->quote    = $request->input('quote');
        $quote->language = $request->input('language');


        $work        = new Work();
        $philosopher = new Philosopher();
        $this->store_new_philosopher_work($request, $philosopher, $work, $quote);

        $quote->save();

        return redirect('/quote/all')->with('alert', 'The quote was edited.');
    }


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

    public function store_concept(Request $request, $quote_id)
    {
        DB::table('concept_quote')->insert([
            'quote_id'   => $quote_id,
            'concept_id' => $request->input('concept')
        ]);

        $redirect_path = '/quote/single/' . $quote_id;

        return redirect($redirect_path)->with('alert', 'The concept has been added.');

    }

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

    public function store_argument(Request $request, $quote_id)
    {
        DB::table('argument_quote')->insert([
            'quote_id'    => $quote_id,
            'argument_id' => $request->input('argument')
        ]);

        $redirect_path = '/quote/single/' . $quote_id;

        return redirect($redirect_path)->with('alert', 'The argument has been added.');
    }

    public function delete($quote_id)
    {
        Quote::find($quote_id)->delete();

        DB::table('argument_quote')->where('quote_id', $quote_id)->delete();
        DB::table('concept_quote')->where('quote_id', $quote_id)->delete();

        return redirect('/quote/all')->with('alert', 'The quote has been deleted.');

    }

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
