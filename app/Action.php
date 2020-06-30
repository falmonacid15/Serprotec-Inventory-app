<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $fillable = [
        'name'
    ];



    public function workOrders()
    {
        return $this->belongsToMany(WorkOrder::class);
    }
}
