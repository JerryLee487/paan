<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    protected $table = 'bills';

    protected $fillable = [
        'clients_id',
        'orders_id',
    ];
}
