<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['user_id'];
    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }
  //  public function user(){
  //      return $this->belongsTo(User::class);
 //   }


    public function getFullPrice(){
        $sum=0;
        foreach ($this->products as $product){
            $sum += $product->getPriceForCount();
        }
        return $sum;
    }
    public function saveOrder($name,$phone){
            $this->name=$name;
            $this->phone=$phone;
            $this->status=1;
            $this->save();
            session()->forget('orderId');
            return true;
    }
}
