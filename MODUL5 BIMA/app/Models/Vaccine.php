<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;
    public function vaksinasi()
    {
        return $this->hasMany('App\Models\Patient');
    }
    protected $table = 'vaccines';
    protected $fillable = ["name", "price", "description", "image"];
}
