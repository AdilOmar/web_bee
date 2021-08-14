<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Workshop;
use Carbon\Carbon;

class Event extends Model
{
    /**
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

    /**
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function retrieveFutureList()
    {
        $events = $this->with(['workshops' => function($query) {
            $query->where('start', '>', Carbon::now()->toDateTimeString());
        }])->get();

        $finalEvents = collect();

        foreach ($events as $event) {
            if ($event->workshops->count()) {
                $finalEvents->push($event);
            }
        }

        return $finalEvents;
    }
}
