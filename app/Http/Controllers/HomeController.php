<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\JobModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $events = Event::orderBy('created_at')->get();
        $applied = (Auth::user()) ? DB::table('register_events')->where('student_id', Auth::user()->id)->pluck('event_id')->toArray() : [];

        $events = $events->map(function($event) use ($applied){
            return (object) [
                'id' => $event->id,
                'instation' => $event->title,
                'position' => $event->keynote_speaker,
                'desc' => $event->description,
                'selection' => $event->selection,
                'start' => $event->start,
                'end' => $event->end,
                'notes' => $event->notes,
                'status' => (in_array($event->id, $applied)) ? true : false
            ];
        });
        
        return view('home', [
            'jobs' => $events
        ]);
    }
}
