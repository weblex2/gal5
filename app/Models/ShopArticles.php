<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ShopArticleDetails;


class ShopArticles extends Model
{
    use HasFactory;

    public function details(){
        return $this->hasMany(ShopArticleDetails::class);
    }

    public function prices(){
        return $this->hasMany(ShopArticlePrices::class);
    }
}
