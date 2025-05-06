<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Event Management | Events</title>
    @vite(['resources/js/app.js'])
    <style>

    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center">Event Management System</h1>

    {{-- SHOW ALL EVENTS WITH UPDATE/DELETE --}}
    @if($events->count() > 0)
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Event</th>
                <th>Description</th>
                <th>Space</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->description }}</td>
                    <td>{{ $event->space->name }}</td>
                    <td>{{ $event-> start_date }}</td>
                    <td> {{ $event->end_date }}</td>
                    <td> <a href="{{ route('event.edit', $event->id) }}" class="btn btn-outline-primary">&#9998;</a></td>
                    <td>
                        <form action="{{ route('event.delete', $event->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">&#88;</button>
                        </form>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h3 class="text-center">There are no events yet!</h3>
    @endif
    <a href="{{ route('event.create') }}" class="btn btn-primary">Create an event</a>
</div>

</body>
</html>
