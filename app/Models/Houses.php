<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Houses extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'detail','active'
    ];

    public function articles(){
        return $this->hasMany(HousesArticle::class);
    }
}
