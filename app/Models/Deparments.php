<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deparments extends Model
{
    use HasFactory;

    protected $table="departments";
    protected $fillable = ['depart_name', 'depart_code'];
}
