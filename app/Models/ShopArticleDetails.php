<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ShopArticles;

class ShopArticleDetails extends Model
{
    use HasFactory;

    public function article()
    {
        return $this->belongsTo('ShopArticles::class');
    }
}
