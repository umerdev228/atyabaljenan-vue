<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderProduct;
use App\OrderStatus;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    //
    public function index(){
        return view('admin.order.index');
    }
    public function getOrder(){

        $statuses=OrderStatus::orderBy('order','Desc')->get();
        $data=Order::select('orders.id','order_no','orders.status_id','invoice_number',
            'customers.name as customername','orders.payment_type',
            'areas.name as area','promo_codes.code','governments.name as government',
            'orders.delivery_charges','subtotal','discount','total'
        )
            ->leftJoin('promo_codes','promo_codes.id','=','orders.promo_code_id')
            ->join('areas','areas.id','=','orders.area_id')
            ->join('governments','governments.id','=','orders.government_id')
            ->join('customers','customers.id','orders.customer_id')
            // ->where('orders.trx_status','completed')
            // ->orWhereNull('orders.trx_id')
            ->orderBy('orders.id','DESC');

        return DataTables::of($data)
            ->addColumn('action',function ($dt) use ($statuses){
               $statushtml='';
                foreach ($statuses as $status){
                    $statushtml.='<a data-id="'.$dt->id.'" data-status-id="'.$status->id.'" style="margin: 5px;" href="#" class="btn btn-success btn-status">'.$status->status.'</a>';
                }
                $statushtml.='<a href="'.url('admin/order/details/'.$dt->id).'" style="margin: 5px;" class=" btn btn-info" target="_blank">Order Details</a>';
                $statushtml.='<a href="" order_id="'.$dt->id.'" class="btn btn-danger delete_order" style="margin: 5px;" target="_blank">Delete Order</a>';

                return $statushtml;

            })->addColumn('status',function ($dt){
                $status=OrderStatus::find($dt->status_id);
                if ($status){
                return '<div class="badge badge-dark">'.$status->status.'</div>';
                }
                return '';
            })->rawColumns(['status','action'])->make(true);
    }
    public function statusUpdate(Request $request){
        $checkStatus=OrderStatus::find($request->status_id);
        if ($checkStatus){
            $order=Order::find($request->id);
            if ($order){
                $order->status_id=$checkStatus->id;
                $order->update();
                return response(['status'=>'success','message'=>$checkStatus->desc,'name'=>$checkStatus->status]);
            }

        }
        return  response(['status'=>'error']);

    }


    public function details($id){
        $order=Order::find($id);
        $statuses=OrderStatus::orderBy('order','Desc')->get();
        $statushtml='';
        foreach ($statuses as $status){
            $statushtml.='<a data-id="'.$id.'" data-status-id="'.$status->id.'" style="margin: 3px;" href="#" class="btn btn-success btn-status">'.$status->status.'</a>';
        }

        return view('admin.order.details',compact('order','statushtml'));
    }
    public function deleteorder(Request $request){
        $deleteorder=Order::find($request->id);
        $deleteorder->delete();
        return response('success');
    }
    public function getSales(){
        $statuses=OrderStatus::orderBy('order','Desc')->get();
        $data=OrderProduct::select('orders.id','order_no','products.name','orders.status_id','invoice_number',
            'customers.name as customername','orders.payment_type',
            'areas.name as area','governments.name as government',
            'orders.discount','order_products.total','order_products.qty','products.price'
        ) ->join('orders','orders.id','=','order_products.order_id')
            ->join('areas','areas.id','=','orders.area_id')
            ->join('governments','governments.id','=','orders.government_id')
            ->join('customers','customers.id','orders.customer_id')
            ->join('products','products.id','=','order_products.item_id')
            ->orderBy('order_products.id','DESC')
            ->groupBY('order_products.id')    ;

        return DataTables::of($data)
            ->addColumn('action',function ($dt) use ($statuses){
                $statushtml='';
                foreach ($statuses as $status){
                    $statushtml.='<a data-id="'.$dt->id.'" data-status-id="'.$status->id.'" style="margin: 5px;" href="#" class="btn btn-success btn-status">'.$status->status.'</a>';
                }
                $statushtml.='<a href="'.url('admin/order/details/'.$dt->id).'" style="margin: 5px;" class=" btn btn-info" target="_blank">Order Details</a>';
                $statushtml.='<a href="" order_id="'.$dt->id.'" class="btn btn-danger delete_order" style="margin: 5px;" target="_blank">Delete Order</a>';

                return $statushtml;

            })->addColumn('status',function ($dt){
                $status=OrderStatus::find($dt->status_id);
                if ($status){
                    return '<div class="badge badge-dark">'.$status->status.'</div>';
                }
                return '';
            })->rawColumns(['status','action'])->make(true);
    }

}
