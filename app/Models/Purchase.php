<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
  public function category()
  {
    return $this->belongsTo(Category::class);
  }
  public function supplier()
  {
    return $this->belongsTo(Supplier::class);
  }
  public function product()
  {
    return $this->belongsTo(Product::class,'product_id', 'id');
  }
  
}
