<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table = "tickets";
    protected $guarded = [] ;

    public function status(){
        return $this->belongsTo(TicketStatus::class , 'ticket_status_id','id');
    }

    public function priority(){
        return $this->belongsTo(TicketPriority::class,'ticket_priority_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(TicketCategory::class,'ticket_category_id','id');
    }

    public function comments(){
        return $this->hasMany(TicketComment::class,'ticket_id','id');
    }

    public function getColorAttribute(){
        switch ($this->status->id) {
            case '1':
                return '#ff880095';
                break;
            case '2':
                return '#00832795';
                break;
            case '3':
                return '#ff000099';
                break;
            case '4':
                return '#7900be95';
                break;
            case '5':
                return '#2d2dff';
                break;

            default:
                return 'black';
                break;
        }

    }
}
