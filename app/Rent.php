<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
   //
   protected $table = 'rent';
   protected $fillable = ['user_id','cd_id','start_rent','end_rent', 'total'];

   public function cd() {
      return $this->belongsTo('App\Cd', 'cd_id');
   }
}