<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TicketController extends Controller
{
    const TICKET_PRICE = 100;

    public function index()
    {
        $today = Carbon::today()->toDateString();
        $ticket = Ticket::firstOrCreate(['date' => $today], ['count' => 0, 'revenue' => 0]);

        $records = Ticket::orderBy('date', 'desc')->get();

        return view('tickets.index', compact('ticket', 'records'));
    }

    public function takeTicket()
    {
        $today = Carbon::today()->toDateString();
        $ticket = Ticket::firstOrCreate(['date' => $today], ['count' => 0, 'revenue' => 0]);
        $ticket->count += 1;
        $ticket->revenue = $ticket->count * self::TICKET_PRICE;
        $ticket->save();

        return redirect()->route('tickets.index')->with('success', 'Ticket taken!');
    }

    public function resetToday()
    {
        $today = Carbon::today()->toDateString();
        $ticket = Ticket::where('date', $today)->first();
        if ($ticket) {
            $ticket->update(['count' => 0, 'revenue' => 0]);
        }
        return redirect()->route('tickets.index')->with('success', 'Today reset done.');
    }
}
