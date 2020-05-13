<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Cd extends Model
{
   //
   protected $table = 'cd';
   protected $fillable = ['title','rate','category','quantity'];
}