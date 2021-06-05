<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
  public function customer()
  {
    return $this->belongsTo(Customer::class);
  }
  public function invoice()
  {
    return $this->belongsTo(Invoice::class);
  }
}
