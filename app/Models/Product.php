<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function scopePriceMin($query,$input){
        return $query->where('price','>',$input);
    }
    public function scopePriceMax($query,$input){
        return $query->where('price','<',$input);
    }
    public function scopeType($query,$input){
        return $query->where('type',$input);
    }
    public function scopeName($query,$input){
        return $query->where('name',$input);
    }

    

    public function new(){
        $new = new Product;
        $new->name = 'Pastel Richos Style';
        $new->desc  = 'chessecake';
        $new->price  = 40.20;
        $new->save();
    }
}
