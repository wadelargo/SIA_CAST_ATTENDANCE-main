<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','date'];


    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public static function list() {

        $events = Event::orderByRaw('id')->get();
        $list = [];
        foreach ($events as $event) {
            $list[$event->id] = $event->title;
        }
        return $list;
    }
}
