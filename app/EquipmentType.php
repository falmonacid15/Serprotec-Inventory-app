<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EquipmentType extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name'
    ];


    public function equipments()
    {
        return $this->hasMany(Equipment::class);
    }
}
