<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $tickets = Ticket::latest()->paginate(10);

        return view('admin.order', [
            'tickets' => $tickets,
        ]);
    }

    public function report()
    {
        $checked = Ticket::whereNotNull('checked')->paginate(10);
        $uncheck = Ticket::whereNull('checked')->paginate(10);

        return view('admin.report', [
            'checked' => $checked,
            'uncheck' => $uncheck,
        ]);
    }

    public function checkin()
    {
        if (request('search')) {
            $number = request('search');
            $tiket = Ticket::where('number', $number)->first();
            return view('admin.checkin', [
                'tiket' => $tiket,
            ])->with('result', 'Data berhasil didapatkan');
        }
        return view('admin.checkin');
    }

    public function checked()
    {
        $number = request('id');
        $tickets = Ticket::where('number', $number)->first();
        $tickets->checked = 'yes';

        $tickets->save();

        return redirect('/admin/check?search=' . $number)->with('checked', 'berhasil');
    }

    public function edit(Ticket $ticket)
    {
        return view('admin.edit', compact('ticket'));
    }
    
    public function update(Request $request,Ticket $ticket)
    {
        $validated = $request->validate([
                'email' => 'required|email',
                'nama' => 'required',
                'ktp' => 'required',
                'checked' => 'required'
            ]);
        
        if($validated['checked'] == 'Tersedia')
        {
            $validated['checked'] = NULL;
        }
        else{
            $validated['checked'] = 'yes';
        }

        Ticket::find($ticket->id)
                ->update($validated);

        return redirect('admin/')->with('edited', '');
    }
}