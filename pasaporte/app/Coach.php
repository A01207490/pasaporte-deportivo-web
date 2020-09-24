<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    protected $guarded = [];

    public function path()
    {
        return route('coaches.show', $this);
    }

    public function clases()
    {
        return $this->hasMany(Clase::class);
    }
}
