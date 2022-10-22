<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopArticlePrices extends Model
{
    use HasFactory;

    public function article()
    {
        return $this->belongsTo('ShopArticles::class');
    }
}
