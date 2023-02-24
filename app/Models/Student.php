<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Student extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='students';

    //mutator
    public function setEmailAttribute($value){
        $this->attributes['email']=strtolower($value);
    }

    //accessor
    public function getNameAttribute($value){
        return strtoupper($value);
    }
}
