<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = "transactions";
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

    public function user(){
        return $this->belongsTo(User::class);
    }
}
