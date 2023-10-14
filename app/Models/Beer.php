<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Beer extends Model

{
    use HasFactory;
    protected $fillable = ['name','image','price'];
    
}
