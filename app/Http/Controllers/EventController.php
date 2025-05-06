<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Models\Space;
use App\Traits\ApiResponse;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EventController extends Controller
{
    use ApiResponse;

    public function index(): View
    {
        $events = Event::all()->sortByDesc('start_date');

        return view('events', ['events' => $events]);
    }

    public function create(): View
    {
        $spaces = Space::all();
        return view('event', ['method' => 'POST', 'action' => route('event.store'), 'spaces' => $spaces]);
    }

    public function store(Request $request): RedirectResponse
    {
        $event = new Event();
        $validator = $event->validate($request->all());

        if($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $event->fill([
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'space_id' => $request->space_id
        ]);

        $event->save();

        return redirect()->route('events');
    }

    public function edit(Event $event)
    {
        $spaces = Space::all();
        return view('event', ['method' => 'PUT', 'action' => route('event.update', $event), 'event' => $event, 'spaces' => $spaces]);
    }


    public function update(Request $request, Event $event): RedirectResponse
    {
        $validator = $event->validate($request->all());

        if($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $event->fill([
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'space_id' => $request->space_id
        ]);

        $event->save();
        return redirect()->route('events');
    }

    public function destroy(Event $event): RedirectResponse
    {
        $event->delete();
        return redirect()->route('events');
    }

    public function upcomingEvents(): \Illuminate\Http\JsonResponse
    {
        return $this->successResponse(EventResource::collection(Event::with('space')->where('start_date', '>=', Carbon::now())->get()));
    }
}
