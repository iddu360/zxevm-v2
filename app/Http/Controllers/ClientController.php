<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Venue;
use App\Models\Ticket;
use App\Models\Bookmark;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class ClientController extends Controller
{
    public function index()
    {
        $events = Event::where('ev_status', 'active')->orderBy('ev_date0', 'desc')->get();
        return view('client.index', compact('events'));
    }

    public function events()
    {
        $events = Event::where('ev_status', 'active')->orderBy('ev_date0', 'desc')->get();
        return view('client.events', compact('events'));
    }

    public function eventDetails($id)
    {
        $event = Event::where('ev_id', $id)->firstOrFail();
        return view('client.event-details', compact('event'));
    }

    public function bookTicket($id)
    {
        $event = Event::where('ev_id', $id)->firstOrFail();
        return view('client.book-ticket', compact('event'));
    }

    public function submitBooking(Request $request)
    {
        $request->validate([
            'event_id' => 'required',
            'quantity' => 'required|integer|min:1',
            'email' => 'required|email',
        ]);

        $event = Event::where('ev_id', $request->event_id)->firstOrFail();

        // Create ticket
        $ticket = Ticket::create([
            't_no' => 'TKT-' . strtoupper(uniqid()),
            't_evid' => $event->ev_id,
            't_event' => $event->ev_name,
            't_validity' => $event->ev_date1,
            't_type' => 'standard',
            't_price' => $event->ev_entrance,
            't_qty' => $request->quantity,
            't_user' => $request->email,
        ]);

        // Send email (placeholder)
        // Mail::to($request->email)->send(new TicketConfirmation($ticket));

        return redirect()->route('ticket.preview', $ticket->id);
    }

    public function ticketPreview($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('client.ticket', compact('ticket'));
    }

    public function ticketPdf($id)
    {
        $ticket = Ticket::findOrFail($id);
        $pdf = Pdf::loadView('client.ticket-pdf', compact('ticket'));
        return $pdf->download('ticket_' . $ticket->t_no . '.pdf');
    }

    // API methods for AJAX
    public function getEvents(Request $request)
    {
        $events = Event::where('ev_status', 'active')->orderBy('ev_date0', 'desc')->get();
        return response()->json($events);
    }

    public function toggleBookmark(Request $request)
    {
        $user = Auth::user();
        if (!$user) return response()->json(['error' => 'Unauthorized'], 401);

        $event = Event::where('ev_id', $request->event_id)->firstOrFail();
        $bookmark = Bookmark::where('user_id', $user->id)->where('event_id', $event->id)->first();

        if ($bookmark) {
            $bookmark->delete();
            return response()->json(['bookmarked' => false]);
        } else {
            Bookmark::create(['user_id' => $user->id, 'event_id' => $event->id]);
            return response()->json(['bookmarked' => true]);
        }
    }

    public function toggleLike(Request $request)
    {
        $user = Auth::user();
        if (!$user) return response()->json(['error' => 'Unauthorized'], 401);

        $event = Event::where('ev_id', $request->event_id)->firstOrFail();
        $like = Like::where('user_id', $user->id)->where('event_id', $event->id)->first();

        if ($like) {
            $like->delete();
            return response()->json(['liked' => false]);
        } else {
            Like::create(['user_id' => $user->id, 'event_id' => $event->id]);
            return response()->json(['liked' => true]);
        }
    }
}
