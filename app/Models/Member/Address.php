<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
  protected $table = 'member_addresses';

  protected $fillable = [
    'member_id',
    'province_id',
    'city_id',
    'district_id',
    'subdistrict_id',
    'address',
    'latitude',
    'longitude',
  ];
  
  public function member() {
    return $this->belongsTo('App\Models\Member\Member', 'member_id');
  }
}
