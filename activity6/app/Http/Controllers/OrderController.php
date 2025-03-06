<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        return view("welcome");
    }
    public function customer($customerID, $name, $address){
        $id = $customerID;
        $name = $name;
        $add = $address;
        return view("customer", compact("id", "name", "add"));
    }

    public function item($itemNo, $name, $price){
        $itemNo = $itemNo;
        $name = $name;
        $price = $price;
        return view("item", compact("itemNo", "name", "price"));
    }

    public function order($customerID, $name, $orderNo, $date){
        $id = $customerID;
        $name = $name;
        $orderNo = $orderNo;
        $date = $date;
        return view("order", compact("id", "name", "orderNo", "date"));
    }
    public function orderDetail($transNo, $orderNo, $itemNo, $name, $price,  $qty){
        $transNo = $transNo;
        $orderNo = $orderNo;
        $itemNo = $itemNo;
        $name = $name;
        $price = $price;
        $qty = $qty;
        return view("orderDetails", compact("transNo", "orderNo", "itemNo", "name", "price", "qty"));
    }
}
