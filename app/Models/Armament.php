<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Armament extends Model
{
    use HasFactory;
    protected $table = 'armament';

    
    public function spaceship()
    {
        return $this->belongsTo(Spaceship::class);
    }


}
