<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  public function category()
  {
    return $this->belongsTo(Category::class);
  }
  public function supplier()
  {
    return $this->belongsTo(Supplier::class);
  }
  public function unit()
  {
    return $this->belongsTo(Unit::class,'unit_id', 'id');
  }  
}
