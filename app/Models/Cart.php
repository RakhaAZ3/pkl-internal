<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    //kolom/field yang boleh di isi
    protected $fillable = ['id','user_id','session_id'];
    public $timestamp =true;
}
