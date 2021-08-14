<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Workshop;

class Event extends Model
{
    /**
     * @param array $options
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function retrieveList()
    {
        return $this->with(['workshops'])->get();
    }

    /**
     * Workshops
     * @return HasMany
     */
    public function workshops()
    {
        return $this->hasMany(Workshop::class);
    }
}
