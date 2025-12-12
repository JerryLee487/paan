<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'products_id',
        'clients_id',
    ];

    public function products()
    {
        return $this->belongsTo(Products::class, 'products_id');
    }
    public function clients()
    {
        return $this->belongsTo(Clients::class, 'clients_id');
    }
}
