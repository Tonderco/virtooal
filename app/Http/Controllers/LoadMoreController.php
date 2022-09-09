<?php

namespace App\Http\Controllers;

use App\Models\ShopItem;
use Illuminate\Http\Request;

class LoadMoreController extends Controller
{
    public function index()
    {
        \App\Actions\FillTable::run();
        $shopItems = ShopItem::orderBy('price', 'asc')->paginate(3);
        return view('welcome', ['items' => $shopItems]);
    }

    public function loadMoreData(Request $request)
    {
        if($request->ajax())
        {
            if($request->id > 0)
            {
                $items = ShopItem::where('id', '<', $request->id)
                                ->orderBy('price', 'asc')
                                ->limit(3)
                                ->get();
            }
            else
            {
                $items = ShopItem::orderBy('price', 'asc')
                          ->limit(3)
                          ->get();
            }
            $output = '';
            $last_id = '';

            if(!$items->isEmpty())
            {
                foreach($items as $item)
                {
                    $output .= '
                    <tr>
                    <th >$item->PRODUCT_NAME</th >
                    <td >{{ $item->DESCRIPTION }}</td >
                    <td ><a href="{{ $item->URL }}">{{ $item->URL }}</a ></td >
                    <td ><img src="{{ $item->IMAGE_URL }}" alt="image"></td >
                    <td >{{ $item->PRICE }}</td >
                    </tr>
                    ';
                    $last_id = $item->id;
                }
                $output .= '
                   <div id="load_more">
                    <button type="button" name="load_more_button" class="btn btn-success form-control" data-id="'.$last_id.'" id="load_more_button">Load More</button>
                   </div>
                ';
            }
            else
            {
                $output .= '
                   <div id="load_more">
                    <button type="button" name="load_more_button" class="btn btn-info form-control">No Data Found</button>
                   </div>
                   ';
            }
            echo $output;
        }
    }
}
