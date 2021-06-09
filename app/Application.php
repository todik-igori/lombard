<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable=['name','category_id','email','weight','sample','description','image'];
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
