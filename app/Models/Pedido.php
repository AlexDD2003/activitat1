<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'order';
    protected $fillable = ['user_id', 'order', 'total'];
}
