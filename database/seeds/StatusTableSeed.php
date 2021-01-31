<?php

use Illuminate\Database\Seeder;

class StatusTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $statusOntheway=new \App\OrderStatus();
        $statusOntheway->status='On The Way';
        $statusOntheway->desc='Your Food is On the way';
        $statusOntheway->is_default='yes';
        $statusOntheway->order=0;
        $statusOntheway->save();

        $preparing=new \App\OrderStatus();
        $preparing->status='Preparing';
        $preparing->desc='Your Food is Being Prepared..';
        $preparing->is_default='no';
       $preparing->order=1;
        $preparing->save();


        $delivery=new \App\OrderStatus();
        $delivery->status='Delivered';
        $delivery->desc='Your Order is Delivered';
        $delivery->is_default='yes';
        $delivery->order=2;
        $delivery->save();

        $statusOntheway=new \App\OrderStatus();
        $statusOntheway->status='Accept';
        $statusOntheway->desc='Your Order is Accepted';
        $statusOntheway->is_default='no';
        $statusOntheway->order=3;
        $statusOntheway->save();


        $statusOntheway=new \App\OrderStatus();
        $statusOntheway->status='Reject';
        $statusOntheway->desc='Your Order is Accepted';
        $statusOntheway->is_default='no';
        $statusOntheway->order=4;
        $statusOntheway->save();

    }
}
