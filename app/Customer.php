<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function issues(){
        return $this->hasMany(Issue_status::class,'customer_id');
    }

    public function returns(){
        return $this->hasMany(Return_status::class,'customer_id');
    }

    public function branches(){
        return $this->belongsTo(Branch::class);
    }
}


