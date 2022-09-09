<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'GROUP_ID',
        'ITEM_ID',
        'PRODUCT_NAME',
        'DESCRIPTION',
        'PRICE',
        'IMG_URL',
        'URL',
        'CATEGORY',
        'SEX',
        'EAN',
        'MANUFACTURER',
    ];
}
