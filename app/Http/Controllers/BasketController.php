<?php

namespace App\Http\Controllers;

use App\Classes\Basket;
use App\Http\Requests\OrderRequest;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{

    public function basket(){
        $order=(new Basket())->getOrder();
        return view('basket',compact('order'));
    }

    public function basketConfirm(OrderRequest $request){

        if ((new Basket())->saveOrder($request->name,$request->phone)){
             session()->flash('success','Ваш заказ принят');
                }else{
                     session()->flash('warning','Товар не доступен для заказа в полном объёме');
                    }

        return redirect('/');
}

    public function basketPlace(){
        $basket=new Basket();
        $order=$basket->getOrder();
        if (!$basket->countAvailable()){
            session()->flash('warning','Товар не доступен для заказа в полном объёме');
            return redirect()->route('basket');
        }
        return view('order',compact('order'));
    }


    public function basketAdd(Product $product){
        $result=(new Basket(true))->addProduct($product);
        if ($result){
            session()->flash('success','Добавлен товар'.$product->name);
        }else{
            session()->flash('warning','Товар'.$product->name .'в большем кол-ве не доступен для заказа');
        }

        return redirect('basket');
    }


    public function basketRemove(Product $product){
        (new Basket())->removeProduct($product);



        session()->flash('warning','Удален товар'.$product->name);
        return redirect('basket');
    }

}
