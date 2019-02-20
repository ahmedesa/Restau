<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resturant extends Model
{
    protected $guarded = [];
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

}
