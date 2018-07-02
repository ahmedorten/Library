<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Return_status extends Model
{
    public function customers(){
        return $this->belongsTo(Customer::class );
    }

}
