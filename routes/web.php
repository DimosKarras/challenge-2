<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/events', [EventController::class, 'index'])->name('events');

Route::get('/events/create', [EventController::class, 'create'])->name('event.create');

Route::post('/events/', [EventController::class, 'store'])->name('event.store');

Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('event.edit');

Route::put('/events/{event}', [EventController::class, 'update'])->name('event.update');

Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('event.delete');
