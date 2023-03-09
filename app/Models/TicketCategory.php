<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketCategory extends Model
{
    use HasFactory;
    protected $table = "ticket_categories";
    protected $guarded = [] ;

    public function permission(){
        return $this->belongsTo(Permission::class,'permission_id','id');
    }
}
