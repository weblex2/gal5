<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseFormular extends Model
{
    use HasFactory;
    protected $table = 'house_formular';

    public function inputs(){
        return $this->hasMany(HouseFormularInput::class);

    }

}