<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::all();

        return view('admin.event',  compact('events'));
    }

    public function create()
    {

        return view('admin.eventcreate');
    }

    public function insert(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'keynote_speaker' => 'required',
            'location' => 'required',
            'start' => 'required',
            'end' => 'required',
            'date' => 'required',
            'description' => 'required',
        ]);

        $input = $request->all();
        Event::create($input);

        return redirect()->route('admin.event')->with('success', 'Acara berhasil ditambahkan !');
    }

    public function show($id)
    {
        $event = Event::find($id);

        return view('admin.eventdetail', compact('event'));
    }

    public function edit($id)
    {
        $event = Event::find($id);

        return view('admin.eventedit', compact('event'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'keynote_speaker' => 'required',
            'location' => 'required',
            'start' => 'required',
            'end' => 'required',
            'date' => 'required',
            'description' => 'required',
        ]);

        $event = Event::find($request->id);

        $event->title = $request->title;
        $event->keynote_speaker = $request->keynote_speaker;
        $event->location = $request->location;
        $event->start = $request->start;
        $event->end = $request->end;
        $event->date = $request->date;
        $event->description = $request->description;
        $event->save();

        return redirect()->route('admin.event')->with('success', 'Acara berhasil diubah !');
    }

    public function delete($id)
    {
        $event = Event::find($id);
        $event->delete();

        return redirect()->route('admin.event')->with('success', 'Acara berhasil dihapus !');

    }
}
