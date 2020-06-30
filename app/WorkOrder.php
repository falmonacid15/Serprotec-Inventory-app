<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    protected $fillable = [
        'diagnostic', 'observation', 'start_time', 'end_time', 'start_date', 'end_date', 'ticket_number',
        'service_tag', 'equipment_id', 'commune_id', 'user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }

    public function commune()
    {
        return $this->belongsTo(Commune::class);
    }

    public function actions()
    {
        return $this->belongsToMany(Action::class);
    }
}
