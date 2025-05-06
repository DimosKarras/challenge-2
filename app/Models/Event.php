<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Event extends Model
{
    protected $table = 'events';
    protected $fillable = ['title', 'description', 'start_date', 'end_date', 'space_id'];
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];


    public function validate(array $inputs)
    {

        return Validator::make($inputs, [
           'title' => ['required', 'string', 'max:64'],
           'description' => ['nullable', 'string'],
           'start_date' => ['required', 'date'],
           'end_date' => ['required', 'date', 'after_or_equal:start_date'],
            'space_id' => ['required', 'integer']
        ]);
    }

    public function space()
    {
        return $this->belongsTo(Space::class);
    }
}
