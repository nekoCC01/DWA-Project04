<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quote;
use App\Philosopher;
use App\Work;
use App\Concept;
use App\Argument;
use DB;

class QuoteController extends Controller
{


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
        $quote->philosopher_id = $philosopher_id;

        if ($request->input('work_new') != '') {
            $work                 = new Work();
            $work->title          = $request->input('work_new');
            $work->philosopher_id = $philosopher_id;
            $work->save();
            $quote->work_id = $work->id;
        } else {
            $quote->work_id = $request->input('work');
        }
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
        $quote->philosopher_id = $philosopher_id;

        if ($request->input('work_new') != '') {
            $work                 = new Work();
            $work->title          = $request->input('work_new');
            $work->philosopher_id = $philosopher_id;
            $work->save();
            $quote->work_id = $work->id;
        } else {
            $quote->work_id = $request->input('work');
        }
        $quote->save();

        return redirect('/quote/all')->with('alert', 'The quote was edited.');
    }


    public function add_concept($quote_id)
    {
        $selected_quote = Quote::find($quote_id);

        $showConceptForm  = true;
        $showArgumentForm = true;

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
}
