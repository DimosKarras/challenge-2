<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Space extends Model
{
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
