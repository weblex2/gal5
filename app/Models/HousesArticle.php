<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HousesArticle extends Model
{
    use HasFactory;
    protected $table='houses_article';

    public function houses()
    {
        return $this->belongsTo('Houses::class');
    }
}
