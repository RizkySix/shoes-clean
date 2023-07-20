<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_event = Event::latest()->get();
        return view('events.all_event' , [
            'title' => 'Events',
            'all_event' => $all_event
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(auth()->user()->role != 666){
            return back();
        }
        
        return view('events.create_event' , [
            'title' => 'New Event'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'judul_event.min' => 'Judul event minimal 10 karakter',
            'deskirpsi.min' => 'Deskripsi minimal 50 karakter',
            'deskirpsi.max' => 'Deskripsi maximal 2000 karakter',
            'foto_event.image' => 'Format harus berupa gambar.',
            'foto_event.max' => 'Gambar harus dibawah 5mb.'
        ];
        $validatedData = $request->validate([
            'judul_event' => 'required|string|min:10',
            'deskripsi' => 'required|string|min:50|max:2000',
            'durasi' => 'required|integer',
            'foto_event' => 'required|image|file|max:5120'
        ] , $messages);

            if(auth()->user()->role != 666){
                return back();
            }

            $validatedData['foto_event'] = $request->file('foto_event')->store('foto_event');

            Event::create($validatedData);
            return redirect('/all-event')->with('success' , 'Event baru ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $all_event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $all_event)
    {
        if(auth()->user()->role != 666){
            return back();
        }

        return view('events.edit_event' , [
            'title' => 'Edit Event',
            'event' => $all_event
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $all_event)
    {
        $messages = [
            'judul_event.min' => 'Judul event minimal 10 karakter',
            'deskirpsi.min' => 'Deskripsi minimal 50 karakter',
            'deskirpsi.max' => 'Deskripsi maximal 2000 karakter',
            'foto_event.image' => 'Format harus berupa gambar.',
            'foto_event.max' => 'Gambar harus dibawah 5mb.'
        ];
        $validatedData = $request->validate([
            'judul_event' => 'required|string|min:10',
            'deskripsi' => 'required|string|min:50|max:2000',
            'durasi' => 'required|integer',
            'foto_event' => 'nullable|image|file|max:5120'
        ] , $messages);

        if(auth()->user()->role != 666){
            return back();
        }

           if($request->file('foto_event')){
               if($all_event->foto_event){
                Storage::delete($all_event->foto_event);
               }
                $validatedData['foto_event'] = $request->file('foto_event')->store('foto_event');
           }

            Event::where('id'  , $all_event->id)->update($validatedData);
            return redirect('/all-event')->with('success' , 'Event berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $all_event)
    {
        if($all_event->foto_event){
            Storage::delete($all_event->foto_event);
           }
        Event::destroy($all_event->id);
        return redirect('/all-event')->with('success' , 'Event berhasil dihapus');
    }
}

