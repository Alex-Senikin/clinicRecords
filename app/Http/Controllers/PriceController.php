<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Price;
class PriceController extends Controller
{
    public function priceShow(){
        $priceList=Price::all();
        return view('price', ['priceList'=>$priceList]);
    }
}
