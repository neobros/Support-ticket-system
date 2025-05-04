<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['customer_name', 'email', 'phone', 'problem_description', 'reference', 'is_viewed'];

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
