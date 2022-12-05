<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spaceship extends Model
{
    use HasFactory;
    protected $table = 'Spaceship';

 protected $fillable = [
        'spaceship_name',
     ];
     public function armament()
    {
       // return $this->hasMany(Armament::class);
      return $this->hasMany(Armament::class,'spaceship_id');
    }

           

}
