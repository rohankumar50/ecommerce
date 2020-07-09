<?php

namespace App;

class Cart
{
    private $contents;
    private $totalQty;
    private $totalPrice;

    public function __construct($oldCart){
        if($oldCart){
            $this->contents=$oldCart->contents;
            $this->totalQty=$oldCart->totalQty;
            $this->totalPrice=$oldCart->totalPrice;
        }
    }

    public function addProduct($product , $qty){
        $products=['qty'=>0,'price'=>$product->price,'product'=>$product];
        if($this->contents){
            if(array_key_exists($product->slug,$this->contents)){
                $products=$this->contents[$product->slug];
            }
        }

        $products['qty']+=$qty;
        $products['price']=$product->price*$products['qty'];
        $this->contents[$product->slug]=$products;
        $this->totalQty+=$qty;
        $this->totalPrice+=$product->price;
    }

    public function getContent(){
        return $this->contents;
    }
    public function gettotalQty(){
        return $this->totalQty;
    }
    public function gettotalPrice(){
        return $this->totalPrice;
    }
}