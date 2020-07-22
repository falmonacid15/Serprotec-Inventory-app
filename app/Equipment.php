<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'brand', 'model', 'equipment_type_id'
    ];


    public function businesses()
    {
        return $this->belongsToMany(Business::class);
    }

    public function equipmentType()
    {
        return $this->belongsTo(EquipmentType::class);
    }

    public function workOrders()
    {
        return $this->hasMany(WorkOrder::class);
    }
}
