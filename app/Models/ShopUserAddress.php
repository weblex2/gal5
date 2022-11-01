<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PharIo\Manifest\Author;

class ShopUserAddress extends Model
{
    use HasFactory;

    protected $table  = "shop_user_address";

    public function user()
    {
        return $this->belongsTo('User::class');
    }
}
