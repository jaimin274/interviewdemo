<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductMaster;
use App\Models\InvoiceMaster;

class InvoiceDetailController extends Controller
{
    public function create(Request $request){

        $product = ProductMaster::get();
        $sesion_data = session()->get('form_data');

        if($request->ajax()){
          return "yes";
        }

        return view("products/view", compact('product', 'sesion_data'));
    }

    public function productdatafetach(Request $request){
        $request->product_id;
        return $product_detail = ProductMaster::find($request->product_id);
    }

    public function data_store_session(Request $request) {
        $form_data = array(
            $request->customer_name,
            $request->product_name,
            $request->rate,
            $request->unit,
            $request->qty,
            $request->discount,
            $request->net_amount,
            $request->total_amount,
        );
        
        $request->session()->push( 'form_data', $form_data );
    }

    public function delete_data($id) {
      $product = ProductMaster::get();
      $old_sesion_data = session()->get('form_data');
      $new_session_data =  array_splice($old_sesion_data, $id);
      $sesion_data = session()->put('form_data', $new_session_data);
      session()->put('form_data');
      return view("products/view", compact('product', 'sesion_data'));
    }
}
