<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribtion extends Model
{
    use HasFactory;


    protected $fillable = ['name','maximum_price','type' ,'price', 'status','duration'];



    public function users(){
        return $this->belongsToMany(User::class);
    }

 }
