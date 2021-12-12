<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'patients';
    protected $fillable = ["vaccine_id", "name", "nik", "alamat", "image_ktp", "no_hp"];
}
