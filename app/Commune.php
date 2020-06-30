<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    protected $fillable = [
        'name'
    ];


    public function workOrders()
    {
        return $this->hasMany(WorkOrder::class);
    }
}
