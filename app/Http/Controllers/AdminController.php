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
            $tiket = Ticket::find(request('search'));
            dd($tiket);
            return view('admin.checkin', [
                'tiket' => Ticket::find()->with('result', 'Data berhasil didapatkan'),
            ]);
        }
        return view('admin.checkin');
    }
}