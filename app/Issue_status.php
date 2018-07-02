<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue_status extends Model
{
    public function customers(){
        return $this->belongsTo(Customer::class  );
    }


}
