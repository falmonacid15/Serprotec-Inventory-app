<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $fillable = [
      'name', 'address', 'phone', 'social_reason', 'customer_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function equipments()
    {
        return $this->hasMany(Equipment::class);
    }
}
