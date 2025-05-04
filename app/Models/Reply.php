<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = ['ticket_id', 'message','is_agent'];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
