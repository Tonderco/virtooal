<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;

class FillTable
{
    use AsAction;

    public function handle ()
    {
        $xml1       = file_get_contents(public_path('products_1.xml'));
        $xml1       = str_replace("<![CDATA[", "", $xml1);
        $xml1       = str_replace("]]>", "", $xml1);
        $xmlObject1 = simplexml_load_string($xml1);
        $json1      = json_encode($xmlObject1);
        $phpArray1  = json_decode($json1, TRUE);
        $items1     = $phpArray1['SHOPITEM'];

        $xml2       = file_get_contents(public_path('products_2.xml'));
        $xml2       = str_replace("<![CDATA[", "", $xml2);
        $xml2       = str_replace("]]>", "", $xml2);
        $xmlObject2 = simplexml_load_string($xml2);
        $json2      = json_encode($xmlObject2);
        $phpArray2  = json_decode($json2, TRUE);
        $items2     = $phpArray2['SHOPITEM'];

        $xml3       = file_get_contents(public_path('products_3.xml'));
        $xml3       = str_replace("<![CDATA[", "", $xml3);
        $xml3       = str_replace("]]>", "", $xml3);
        $xmlObject3 = simplexml_load_string($xml3);
        $json3      = json_encode($xmlObject3);
        $phpArray3  = json_decode($json3, TRUE);
        $items3     = $phpArray3['SHOPITEM'];

        $items = array_merge($items1, $items2, $items3);

        \App\Models\ShopItem::truncate();

        foreach ($items as $item)
        {
            $shopItem = \App\Models\ShopItem::create();

            if($item['GROUP_ID'] != [])
            {
                $shopItem->GROUP_ID = $item['GROUP_ID'];
            }
            else $shopItem->GROUP_ID = NULL;
            $shopItem->save();

            if($item['ITEM_ID'] != [])
            {
                $shopItem->ITEM_ID = $item['ITEM_ID'];
            }
            else $shopItem->ITEM_ID = NULL;

            if($item['PRODUCTNAME'] != [])
            {
                $shopItem->PRODUCT_NAME = $item['PRODUCTNAME'];
            }
            else $shopItem->PRODUCT_NAME = NULL;

            if($item['DESCRIPTION'] != [])
            {
                $shopItem->DESCRIPTION = $item['DESCRIPTION'];
            }
            else $shopItem->DESCRIPTION = NULL;

            if($item['PRICE'] != [])
            {
                $shopItem->PRICE = $item['PRICE'];
            }
            else $shopItem->PRICE = NULL;

            if($item['IMGURL'] != [])
            {
                $shopItem->IMG_URL = $item['IMGURL'];
            }
            else $shopItem->IMG_URL = NULL;

            if($item['URL'] != [])
            {
                $shopItem->URL = $item['URL'];
            }
            else $shopItem->URL = NULL;

            if($item['CATEGORY'] != [])
            {
                $shopItem->CATEGORY = $item['CATEGORY'];
            }
            else $shopItem->CATEGORY = NULL;

            if($item['SEX'] != [])
            {
                $shopItem->SEX = $item['SEX'];
            }
            else $shopItem->SEX = NULL;

            if($item['EAN'] != [])
            {
                $shopItem->EAN = $item['EAN'];
            }
            else $shopItem->EAN = NULL;

            if($item['MANUFACTURER'] != [])
            {
                $shopItem->MANUFACTURER = $item['MANUFACTURER'];
            }
            else $shopItem->MANUFACTURER = NULL;

            $shopItem->save();
        }
    }
}