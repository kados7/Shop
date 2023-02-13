<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $guarded = [] ;

    public function getStatusAttribute($status){
        switch ($status) {
            case '1':
                $status = 'پرداخت شده' ;
                break;

            default:
                $status = 'در انتظار پرداخت ' ;
                break;
        }
        return $status;
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function address(){
        return $this->belongsTo(UserAddress::class);
    }
}
