<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Photo;
use App\Models\User;
use Validator;
use Response;
use Carbon\Carbon;

class VisualController extends Controller
{
    public function index() {
        return view('event.index', [
            'events' => event::recent()->orderBy('date_end', 'desc')->paginate(10),
            'oldEvents' => event::old()->count() > 0
        ]);
    }

    public function indexOlds() {
        return view('event.olds', [
            'events' => event::old()->orderBy('date_end', 'desc')->paginate(10)
        ]);
    }

    public function show(Request $request, $hashid) {
        return view('event.show', [
            'event' => event::whereId(decodeId($hashid))->firstOrFail(),
        ])
        // ->with('status', 'success')->with('content', 'Vous avez déjà ajouté une photo, modifiez-la')
        ;

    }

    public function laureats(Request $request) {
        return view('visual.laureats', [
            'events' => event::voted()->orderBy('date_end', 'desc')->get(),
        ]);
    }

    public function laureat(Request $request, $hashid) {
        return view('visual.laureat', [
            'event' => event::whereId(decodeId($hashid))->firstOrFail(),
            'podium' => photo::event($hashid)->hasNote()->orderBy('place')->take(3)->get(),
            'nomineds' => photo::event($hashid)->hasNote()->hasNomination()->get(),
        ]);
    }

    public function results(Request $request, $hashid) {
        return view('event.results', [
            'event' => event::whereId(decodeId($hashid))->firstOrFail(),
            'podium' => photo::event($hashid)->hasNote()->orderBy('place')->take(3)->get(),
            'nomineds' => photo::event($hashid)->hasNote()->hasNomination()->get(),
            'results' => photo::event($hashid)->hasNote()->orderBy('place')->paginate(5)
        ]);
    }
}