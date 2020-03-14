<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locker extends Model
{
  protected $fillable = [
    'locker_code',
    'available'
  ];
}
