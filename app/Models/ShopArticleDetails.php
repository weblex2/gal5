<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopArticleDetails extends Model
{
    use HasFactory;

    public function houses()
    {
        return $this->belongsTo('ShopArticles::class');
    }
}
