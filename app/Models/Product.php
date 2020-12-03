<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function scopePriceMin($query,$price){
        return $query->where('price','>',$price);
    }
    public function scopePriceMax($query,$price){
        return $query->where('price','<',$price);
    }
    public function scopeType($query,$type){
        return $query->where('type',$type);
    }

    

    public function new(){
        $new = new Product;
        $new->name = 'Pastel Richos Style';
        $new->desc  = 'chessecake';
        $new->price  = 40.20;
        $new->save();
    }
}
