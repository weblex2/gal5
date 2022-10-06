<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Houses extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    public function articles(){
        return $this->hasMany(HousesArticle::class);
    }

    public function translations(){
        return $this->hasMany(HouseTranslation::class);
    }
}
