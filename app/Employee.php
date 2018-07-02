<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function branches(){
        return $this->belongsTo(Branch::class);
    }
}
