<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipmentType extends Model
{
    protected $fillable = [
        'name'
    ];


    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }
}
