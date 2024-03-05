<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
  use HasFactory;

  public $timestamps = true;

  public $fillable = [
    'user_id',
    'product_id',
    'product_name',
    'price',
    'status',
    'snap_token',
  ];
}
