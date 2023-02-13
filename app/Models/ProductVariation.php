<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariation extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table = "product_variations";
    protected $with=['attribute'];

    public function attribute(){
        return $this->belongsTo(Attribute::class);
    }

    public function hasVariationDiscount(){
        if($this->sale_price and Carbon::now() > $this->date_on_sale_from and Carbon::now() < $this->date_on_sale_to and $this->quantity>0){
            return true;
        }
        else{
            return false;
        }

    }
    public function getVariationMinPrice(){
        if($this->sale_price and Carbon::now() > $this->date_on_sale_from and Carbon::now() < $this->date_on_sale_to and $this->quantity>0){
            return $this->sale_price < $this->price ? $this->sale_price : $this->price ;
        }
        else{
            return $this->price;
        }
    }

    public function variationDiscount(){
        return 100 -(($this->sale_price * 100)/$this->price);
    }
    // public function getIsSaleAttribute(){

    //     return $
    // }

}
