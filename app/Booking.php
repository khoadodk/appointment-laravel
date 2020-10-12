<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Booking extends Model
{
    protected $guarded = [];

    public function doctor()
    {
        return $this->belongsTo(User::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
