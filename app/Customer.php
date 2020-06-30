<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 'surname', 'email', 'phone', 'rut'
    ];

    public function businesses()
    {
        return $this->hasMany(Business::class);
    }
}
