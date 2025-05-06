<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Event Management</title>
    @vite(['resources/js/app.js'])
    <style>

    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center">Event Management System</h1>

    {{-- SHOW EVENT --}}
    <div>
        <form action="{{ $action }}" method="POST">
            @csrf
            @method($method)
            <div class="mb-3 mt-3">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" @if($method == 'PUT') value="{{$event->title ?? ''}}" @endif>
                @error('title')
                <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="description">Description:</label>
                <input type="text" class="form-control" id="description" placeholder="Enter description" name="description" @if($method == 'PUT') value="{{$event->description ?? ''}}" @endif>
                @error('description')
                <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="space_id">Select Space:</label>
                <select class="form-control" id="space_id" name="space_id">
                    <option value="">-- Choose a space --</option>
                    @foreach($spaces as $space)
                        <option value="{{ $space->id }}" @if(old('space_id', $event->space_id ?? '') == $space->id) selected @endif>
                            {{ $space->name }}
                        </option>
                    @endforeach
                </select>
                @error('space_id')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 mt-3">
                <label for="start_date">Start Date:</label>
                <input type="date" class="form-control" id="start_date" placeholder="Enter Start Date" name="start_date" @if($method == 'PUT') value="{{$event->start_date->format('Y-m-d') ?? ''}}" @endif>
                @error('start_date')
                <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="end_date">End Date:</label>
                <input type="date" class="form-control" id="end_date" placeholder="Enter End Date" name="end_date" @if($method == 'PUT') value="{{$event->end_date->format('Y-m-d') ?? ''}}" @endif>
                @error('end_date')
                <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>

</body>
</html>
