<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
  protected $table = 'member_addresses';

  public function member() {
    return $this->belongsTo('App\Models\Member\Member', 'member_id');
  }
}
