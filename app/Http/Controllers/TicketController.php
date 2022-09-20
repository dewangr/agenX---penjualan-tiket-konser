<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tickets.index', [
            'title' => 'Home',
            'active' => 'home'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tickets.create', [
            'title' => 'Pesan Tiket',
            'active' => 'buy'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTicketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicketRequest $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email:dns',
            'ktp' => 'required|min:16|max:16'
        ]);

        $ticket = new Ticket;
        $ticket->nama = $request->nama;
        $ticket->ktp = $request->ktp;
        $ticket->email = $request->email;

        $ticket->save();

        return redirect()->route('tickets.show', $ticket->id)->with('success', ' ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return view('tickets.show', [
            'ticket' => $ticket,
            'active' => 'buy',
            'title' => 'Detail Tiket'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        // return view('admin.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTicketRequest  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'nama' => 'required',
            'ktp' => 'required',
        ]);

        dd($ticket);
        
        Ticket::where('id', $ticket->id)
        ->update($validated);

        return redirect('admin/', [
            'ticket' => $validated,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect('/admin')->with('deleted', 'delete succes');
    }

    public function downloadPDF($id)
    {
        $ticket = Ticket::find($id);
        $pdf = PDF::loadView('pdf', [
            'ticket' => $ticket
        ]);

        return $pdf->download('tiket-no-'.$id.'.pdf');
    }
}