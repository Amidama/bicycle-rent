<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $fillable = [
    'member_id',
    'locker_id',
    'started_at',
    'ended_at'
  ];

  public function member()
  {
      return $this->belongsTo('App\Member');
  }

  public function locker()
  {
      return $this->belongsTo('App\Locker');
  }
}
