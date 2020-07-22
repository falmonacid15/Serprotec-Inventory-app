<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Action extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name'
    ];



    public function workOrders()
    {
        return $this->belongsToMany(WorkOrder::class)->withTimestamps();
    }
}
