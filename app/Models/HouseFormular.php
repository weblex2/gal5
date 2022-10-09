<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseFormular extends Model
{
    use HasFactory;
    protected $table = 'houses_formular';
    protected $fillable = [
        'table',
        'ord',
        'field_name'
    ];

    public function inputs(){
        return $this->hasMany(HouseFormularInput::class);
    }

}
