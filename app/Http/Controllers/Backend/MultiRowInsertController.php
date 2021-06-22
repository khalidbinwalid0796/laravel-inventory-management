<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class MultiRowInsertController extends Controller
{
    public function index(){
        $invoices=DB::table('multirowitems')->where('orders_id',1)->get();
        //dd($invoices);
        return view('backend.pages.multirow.index', compact('invoices'));
    }

    public function create()
    {
        return view('backend.pages.multirow.create');
    }

    public function store(Request $request)
    {

        foreach($request->product_name  as $item=>$i){
            $data=array();
            $data['orders_id']='1';
            $data['product_name']=$request->product_name[$item];
            $data['brand']=$request->brand[$item];
            $data['quantity']=$request->quantity[$item];
            $data['budget']=$request->budget[$item];
            $data['amount']=$request->amount[$item];
            $product=DB::table('multirowitems')->insert($data);
        }
        return redirect()->back()->with('success','data insert successfully');
    }

    public function edit($orders_id)
    {
        $redit=DB::table('multirowitems')->where('orders_id',$orders_id)->get();
        //dd($redit);
        return view('backend.pages.multirow.edit',compact('redit'));
    }

    public function update(Request $request)
    {

        $count_order = count($request->order_id);
            for($i=0;$i<$count_order;$i++){
            $data=array();
            $data['orders_id']='1';
            $data['product_name']=$request->product_name[$i];
            $data['brand']=$request->brand[$i];
            $data['quantity']=$request->quantity[$i];
            $data['budget']=$request->budget[$i];
            $data['amount']=$request->amount[$i];
            $product=DB::table('multirowitems')->where('id',$request->order_id[$i])->update($data);
            //dd($product);
        }
        return redirect()->back()->with('success','data insert successfully');
    }
}