<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkOrder extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'diagnostic', 'observation', 'start_time', 'end_time', 'start_date', 'end_date', 'ticket_number',
        'service_tag', 'equipment_id', 'commune_id', 'user_id', 'business_id'
    ];

    // nos permite manipular fecha
    protected $dates = [
        'start_date', 'end_date', 'start_time', 'end_time'
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

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function actions()
    {
        return $this->belongsToMany(Action::class);
    }
}
