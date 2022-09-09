<?php

namespace App\Actions;

use App\Models\ShopItem;
use Lorisleiva\Actions\Concerns\AsAction;

class GetItems
{
    use AsAction;

    public function handle ()
    {
        return ShopItem::orderBy('price', 'asc')->paginate(3);
    }
}