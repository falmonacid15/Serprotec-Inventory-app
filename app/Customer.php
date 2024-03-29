<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'surname', 'email', 'phone', 'rut'
    ];

    public function businesses()
    {
        return $this->hasMany(Business::class);
    }
}
