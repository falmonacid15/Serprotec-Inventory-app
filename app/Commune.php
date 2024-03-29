<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commune extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name'
    ];


    public function workOrders()
    {
        return $this->hasMany(WorkOrder::class);
    }
}
