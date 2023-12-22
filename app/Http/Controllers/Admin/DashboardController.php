<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $events = DB::table('register_events')
                ->join('events', 'events.id', 'register_events.event_id')
                ->join('users', 'users.id', 'register_events.student_id')
                ->get();

        $events = $this->renderData($events);

        return view('admin.dashboard', compact('events'));
    }

    protected function renderData($data)
    {
        $events = Event::all();
        $event_id = $data->pluck('event_id');

        $result = $events->map(function($event) use($event_id){
            $counted = $event_id->countBy();
            $total = $counted->all();

            return (object) [
                'id' => $event->id,
                'title' => $event->title,
                'keynote_speaker' => $event->keynote_speaker,
                'date' => $event->date,
                'total' => $total[$event->id] ?? 0,
            ];
        })->values();

        return $result;
    }

    public function detail($id)
    {
        $students =  DB::table('register_events')
                        ->where('event_id', $id)
                        ->join('users', 'users.id', 'register_events.student_id')
                        ->get();
        $event = Event::find($id);

        return view('admin.dashboard-detail', compact('students', 'event'));
    }

    public function delete($id, Request $request)
    {
        $register = DB::table('register_events')->where('student_id', $id)->where('event_id', $request->event_id)->delete();

        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }
}
