<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public function employees(){
        return $this->hasMany(Employee::class,'branch_id' );
    }

    public function customers(){
        return $this->hasMany(Customer::class , 'branch_id');
    }
}
