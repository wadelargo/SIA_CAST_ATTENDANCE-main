<?php

namespace App\Http\Controllers;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;


use App\Models\Event;

class EventController extends Controller
{
    public function event()
    {
        $event = Event::orderBy('id')->get();

        return view('event.index',['events' => $event]);
    }

    public function create()
    {
        return view('event.create');
    }

    public function store (Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
        ]);

        Event::create([
            'title'         => $request->title,
            'description'   => $request->description,
            'date'          => $request->date,
        ]);

        return redirect('/event')->with('info', 'A new event has been added');
        
    }

    public function edit(Event $event){
        return view('event.edit', compact('event'));
    }

    public function update (Event $event,Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
        ]);

        $event->update($request->all());
        return redirect('/event')->with('info', "$event->title has been updated succesfully");
    }

    public function delete(Event $event)
    {
    $event->delete();
        return redirect('/event')->with('info', "$event->title has been deleted successfully!");
    }

    public function index()
{
    $events = Event::all();

    return view('events.index', compact('events'));
}

}