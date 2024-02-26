<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketRequest;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    public function index()
    {
        $ticket = Ticket::with('category')->get();
        return response()->json([
            'status' => 200,
            'data' => $ticket,
        ]);
    }

    public function store(TicketRequest $request)
    {
        $validatedData = $request->validated();
        $ticket = Ticket::create($validatedData);
        return response()->json([
            'status' => 200,
            'data' => $ticket,
        ]);
    }

    public function filterTicket($date)
    {
        $filterTicket = Ticket::where('date', $date)->with('category')->get();
        return response()->json([
            'status' => 200,
            'data' => $filterTicket,
        ]);
    }

    public function sortTicket($sort)
    {
        if ($sort == 'desc') {
            $ticket = Ticket::orderBy('id', 'desc')->with('category')->get();
        } else {
            $ticket = Ticket::with('category')->get();
        }
        return response()->json([
            'status' => 200,
            'data' => $ticket,
        ]);
    }

    public function update(TicketRequest $request, string $id)
    {
        $validatedData = $request->validated();
        Ticket::where('id', $id)->update($validatedData);
        return response()->json([
            'status' => 200,
        ]);
    }

    public function ChangeStatus(Request $request)
    {
        Ticket::where('id', $request->id)->update([
            'status' => 'accept',
        ]);
        return response()->json([
            'status' => 200,
        ]);
    }
}
