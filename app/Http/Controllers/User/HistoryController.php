<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
        
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function history()
    {
        $applies = DB::table('register_events')
                        ->join('events', 'register_events.id', '=', 'events.id')
                        ->where('student_id', Auth::user()->id)
                        ->get();

        $applies = $applies->map(function($data){
            return (object) [
                'id' => $data->id,
                'instation' => $data->title,
                'position' => $data->keynote_speaker    ,
                'desc' => $data->description,
                'start' => $data->start,
                'end' => $data->end,
                'selection' => Carbon::parse($data->date)->format('d-m-Y'),
                'apply_date' => Carbon::parse($data->created_at)->format('d-m-Y'),
            ];
        });
        
        return view('user.history', [
            'applies' => $applies
        ]);
    }

    public function delete(Request $request)
    {
        $data = DB::table('register_events')->delete($request->id);

        return redirect()->back()->with('success', 'Berhasil Dihapus !');
    }
}
