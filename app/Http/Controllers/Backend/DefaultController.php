<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\Category;
use App\Models\Purchase;
use Auth;
use DB;
class DefaultController extends Controller
{
    public function getCategory(Request $request){
    	 $supplier_id = $request->supplier_id;
    	 $allCategory = Product::with(['category'])->select('category_id')->where('supplier_id'
    	 ,$supplier_id)->groupBy('category_id')->get();
         // $allCategory = DB::table('products')
         //                ->join('categories','products.category_id','categories.id')
         //                ->select('products.*','categories.name')
         //                ->groupBy('products.category_id')
         //                ->where('products.supplier_id',$supplier_id)
         //                ->orderBy('categories.name','ASC') 
         //                ->get();

    	 return response()->json($allCategory);	
    }
    public function getProduct(Request $request){
    	 $category_id = $request->category_id;
    	 $allProduct = Product::where('category_id',$category_id)->get();
    	 return response()->json($allProduct);	
    }
    public function getStock(Request $request){
         $product_id = $request->product_id;
         $stock = Product::where('id',$product_id)->first()->quantity;
         return response()->json($stock);  
    }       
}
