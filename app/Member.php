<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
  protected $fillable = [
    'card_id',
    'student_id',
    'first_name',
    'last_name',
    'phone_number'
  ];
}
