<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $fillable = [
        'brand', 'model', 'business_id', 'equipment_type_id'
    ];


    public function business()
    {
        return $this->belongsTo(Business::class);
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
