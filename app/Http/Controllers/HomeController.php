<?php

namespace App\Http\Controllers;

use App\Models\JobModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $jobs = JobModel::orderBy('created_at')->get();
        $applied = (Auth::user()) ? DB::table('applies')->where('user_id', Auth::user()->id)->pluck('job_id')->toArray() : [];

        $jobs = $jobs->map(function($job) use ($applied){
            return (object) [
                'id' => $job->id,
                'instation' => $job->instation,
                'position' => $job->position,
                'desc' => $job->desc,
                'selection' => $job->selection,
                'start' => $job->start,
                'end' => $job->end,
                'notes' => $job->notes,
                'status' => (in_array($job->id, $applied)) ? true : false
            ];
        });
        
        return view('home', [
            'jobs' => $jobs
        ]);
    }
}
