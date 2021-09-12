<?php

use App\Product;
use App\ProductImage;
use App\ProductOption;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {     
       
        $items = [
            ['ItemImage' => "products/22s.png",   'latest' => '1', 'bestseller' => '0' ,'ItemNameEn' => '25M 79mm Thermal Paper roll for Cashier', 'ItemName' => 'بكر حراري 25 متر  7.9 سم لطابعات الكاشير',  'POSTP' => '561.6', 'POSPP' => '3.9',  'ActiveItem' => 1, 'InStock' => 1, 'GroupCode' => 1],
            ['ItemImage' => "products/27s.png",   'latest' => '1', 'bestseller' => '0' ,'ItemNameEn' => '55M 79mm Thermal Paper roll for Cashier', 'ItemName' => 'بكر حراري 55 متر  7.9 سم لطابعات الكاشير',  'POSTP' => '576', 'POSPP' => '9',  'ActiveItem' => 1, 'InStock' => 1, 'GroupCode' => 1],
            ['ItemImage' => "products/28s.png",   'latest' => '1', 'bestseller' => '0' ,'ItemNameEn' => '70M 79mm Thermal Paper roll for Cashier 60 roll box', 'ItemName' => 'بكر حراري 70 متر  7.9 سم لطابعات الكاشير كارتونة 60 بكرة',  'POSTP' => '660', 'POSPP' => '11',  'ActiveItem' => 1, 'InStock' => 1, 'GroupCode' => 1],
            ['ItemImage' => "products/29s.png",   'latest' => '1', 'bestseller' => '0' ,'ItemNameEn' => '14M 57mm Thermal Paper roll for Small Printers (Fawry POS)', 'ItemName' => 'بكر حراري 14 متر 5.7 سم للطابعات الصغيرة (ماكينات فوري)',  'POSTP' => '326.4', 'POSPP' => '1.7',  'ActiveItem' => 1, 'InStock' => 1, 'GroupCode' => 1],
            ['ItemImage' => "products/30s.png",   'latest' => '1', 'bestseller' => '0' ,'ItemNameEn' => '16M 57mm Thermal Paper roll for Small Printers (Fawry POS)', 'ItemName' => 'بكر حراري 16 متر 5.7 سم للطابعات الصغيرة (ماكينات فوري)',  'POSTP' => '319.2', 'POSPP' => '1.9',  'ActiveItem' => 1, 'InStock' => 1, 'GroupCode' => 1],
            ['ItemImage' => "products/31s.png",   'latest' => '1', 'bestseller' => '0' ,'ItemNameEn' => '18M 57mm Thermal Paper roll for Small Printers (Fawry POS)', 'ItemName' => 'بكر حراري 18 متر 5.7 سم للطابعات الصغيرة (ماكينات فوري)',  'POSTP' => '361.2', 'POSPP' => '2.15',  'ActiveItem' => 1, 'InStock' => 1, 'GroupCode' => 1],
            ['ItemImage' => "products/23s.png",   'latest' => '1', 'bestseller' => '0' ,'ItemNameEn' => '28M 57mm Thermal Paper roll for Small Printers (Fawry POS)', 'ItemName' => 'بكر حراري 28 متر 5.7 سم للطابعات الصغيرة (ماكينات فوري)',  'POSTP' => '403.2', 'POSPP' => '3.36',  'ActiveItem' => 1, 'InStock' => 1, 'GroupCode' => 1],
            ['ItemImage' => "products/24s.png",   'latest' => '1', 'bestseller' => '0' ,'ItemNameEn' => '40M 57mm Thermal Paper roll for Small Printers (Fawry POS)', 'ItemName' => 'بكر حراري 40 متر 5.7 سم للطابعات الصغيرة (ماكينات فوري)',  'POSTP' => '384', 'POSPP' => '4.8',  'ActiveItem' => 1, 'InStock' => 1, 'GroupCode' => 1],
            ['ItemImage' => "products/25s.png",   'latest' => '1', 'bestseller' => '0' ,'ItemNameEn' => '4*6 cm 450 Label thermal sticker roll (For Barcode Scales)', 'ItemName' => 'بكر لاصق 4*6 سم 450 ملصق (لموازين البار كود)',  'POSTP' => '1150', 'POSPP' => '11.5',  'ActiveItem' => 1, 'InStock' => 1, 'GroupCode' => 1],
            ['ItemImage' => "products/26s.png",   'latest' => '1', 'bestseller' => '0' ,'ItemNameEn' => '4*5 cm 450 Label thermal sticker roll (For Barcode Scales)', 'ItemName' => 'بكر لاصق 4*5 سم 450 ملصق (لموازين البار كود)',  'POSTP' => '1050', 'POSPP' => '10.5',  'ActiveItem' => 1, 'InStock' => 1, 'GroupCode' => 1],
            ['ItemImage' => "products/32s.png",   'latest' => '1', 'bestseller' => '0' ,'ItemNameEn' => 'Barcode thermal printer labels roll 4*2.5cm 1500 label (non-Splited)', 'ItemName' => 'بكر لاصق لطابعات الباركود 1500 ملصق 4*2.5سم (غير مقسوم)',  'POSTP' => '1344', 'POSPP' => '16',  'ActiveItem' => 1, 'InStock' => 1, 'GroupCode' => 1],
            ['ItemImage' => "products/33s.png",   'latest' => '1', 'bestseller' => '0' ,'ItemNameEn' => 'Barcode thermal printer labels roll 4*2.5cm 1500 label (Splited)', 'ItemName' => 'بكر لاصق لطابعات الباركود 1500 ملصق 4*2.5سم ( مقسوم)',  'POSTP' => '1344', 'POSPP' => '16',  'ActiveItem' => 1, 'InStock' => 1, 'GroupCode' => 1],
            ['ItemImage' => "products/1.png",   'latest' => '1', 'bestseller' => '0' ,'ItemNameEn' => 'Datalogic Magellan MultiDimensional Rays Barcode Scanner', 'ItemName' => 'قارئ باركود ماجيلان من داتا لوجيك متعدد الأشعة',  'POSTP' => '4950', 'POSPP' => '4950',  'ActiveItem' => 1, 'InStock' => 1, 'GroupCode' => 2],
            ['ItemImage' => "products/2.png",   'latest' => '1', 'bestseller' => '0' ,'ItemNameEn' => 'Datalogic QuickScan lite Handheld Barcode Scanner', 'ItemName' => 'قارئ باركود كفي كويك سكان من داتا لوجيك',  'POSTP' => '975', 'POSPP' => '975',  'ActiveItem' => 1, 'InStock' => 1, 'GroupCode' => 2],
            ['ItemImage' => "products/3.png",   'latest' => '1', 'bestseller' => '0' ,'ItemNameEn' => 'SunMi-POSThings certified HandHeld 2D Imager', 'ItemName' => 'سن مي - بي او اس ثيجز قارئ باركود كفي ثنائي الأبعاد',  'POSTP' => '850', 'POSPP' => '999',  'ActiveItem' => 1, 'InStock' => 1, 'GroupCode' => 2],
            ['ItemImage' => "products/4.png",   'latest' => '1', 'bestseller' => '0' ,'ItemNameEn' => 'POSThings MultiDimensional Standing Barcode Scanner', 'ItemName' => 'بي او اس ثينجز قارئ باركود مكتبي متعدد الأبعاد',  'POSTP' => '3950', 'POSPP' => '3950',  'ActiveItem' => 1, 'InStock' => 1, 'GroupCode' => 2],
            ['ItemImage' => "products/5.png",   'latest' => '1', 'bestseller' => '1' ,'ItemNameEn' => 'Dibal OPOS compatible Checkout scale', 'ItemName' => 'ميزان تشك اوت يعمل مع نظام اوبوس من ديبال',  'POSTP' => '5500', 'POSPP' => '5500',  'ActiveItem' => 1, 'InStock' => 1, 'GroupCode' => 2],
            ['ItemImage' => "products/6.png",   'latest' => '1', 'bestseller' => '1' ,'ItemNameEn' => 'Mettler Toledo Ariva checkout scales - OPOS compatible', 'ItemName' => 'ميزان تشك اوت اريفا يعمل مع نظام اوبوس من ميتلر توليدو',  'POSTP' => '7500', 'POSPP' => '7500',  'ActiveItem' => 1, 'InStock' => 1, 'GroupCode' => 2],
            ['ItemImage' => "products/16.png",   'latest' => '1', 'bestseller' => '1' ,'ItemNameEn' => 'Rongata RLS Series Labeling scale 6x4', 'ItemName' => 'ميزان بار كود 6*4 طراز RLS من رونجتا',  'POSTP' => '7500', 'POSPP' => '7500',  'ActiveItem' => 1, 'InStock' => 1, 'GroupCode' => 2],
            ['ItemImage' => "products/17.png",   'latest' => '1', 'bestseller' => '1' ,'ItemNameEn' => 'Dibal DFS Series Labeling scale', 'ItemName' => 'ميزان بار كود يعمل مع DFS من ديبال',  'POSTP' => '14500', 'POSPP' => '14500',  'ActiveItem' => 1, 'InStock' => 1, 'GroupCode' => 2],
            ['ItemImage' => "products/18.png",   'latest' => '1', 'bestseller' => '1' ,'ItemNameEn' => 'POSThings MCR Labeling scale', 'ItemName' => 'ميزان باركود من بي او اس ثينجز طراز MCR',  'POSTP' => '6500', 'POSPP' => '6500',  'ActiveItem' => 1, 'InStock' => 1, 'GroupCode' => 2],
            ['ItemImage' => "products/21.png",   'latest' => '1', 'bestseller' => '1' ,'ItemNameEn' => 'Star TSP100 Series 80mm Receipt printer', 'ItemName' => 'طابعة حرارية 80 مم TSP100 من ستار',  'POSTP' => '2500', 'POSPP' => '2500',  'ActiveItem' => 1, 'InStock' => 1, 'GroupCode' => 2],
            ['ItemImage' => "products/20.png",   'latest' => '1', 'bestseller' => '1' ,'ItemNameEn' => 'POSThings PT80C 80mm Receipt printer', 'ItemName' => 'طابعة حرارية 80 مم PT80C من بي او اس ثينجز',  'POSTP' => '1400', 'POSPP' => '1400',  'ActiveItem' => 1, 'InStock' => 1, 'GroupCode' => 2],
            ['ItemImage' => "products/19.png",   'latest' => '1', 'bestseller' => '1' ,'ItemNameEn' => 'POSThings Essensials Cash Drawer', 'ItemName' => 'درج النقدية اسينشالز من بي او اس ثينجز',  'POSTP' => '600', 'POSPP' => '600',  'ActiveItem' => 1, 'InStock' => 1, 'GroupCode' => 2],
            ['ItemImage' => "products/7.png",   'latest' => '1', 'bestseller' => '1' ,'ItemNameEn' => 'Price Checker hardware Kit by POSThings', 'ItemName' => 'مجموعة مستكشف الأسعار من بي او اس ثينجز',  'POSTP' => '3999', 'POSPP' => '3999',  'ActiveItem' => 1, 'InStock' => 1, 'GroupCode' => 2],
            ['ItemImage' => "products/8.png",   'latest' => '1', 'bestseller' => '1' ,'ItemNameEn' => 'Honeywell EDA51 Handheld Computer', 'ItemName' => 'كمبيوتر كفي EDA51 من هاني ويل',  'POSTP' => '6250', 'POSPP' => '6250',  'ActiveItem' => 1, 'InStock' => 1, 'GroupCode' => 2],
            ['ItemImage' => "products/9.png",   'latest' => '1', 'bestseller' => '1' ,'ItemNameEn' => 'POSThings 15 inch touch screen for Retail purposes', 'ItemName' => 'شاشة تعمل باللمس الحراري 15 بوصة من بي او اس ثينجز',  'POSTP' => '3000', 'POSPP' => '3000',  'ActiveItem' => 1, 'InStock' => 1, 'GroupCode' => 2],
            ['ItemImage' => "products/10.png",   'latest' => '1', 'bestseller' => '1' ,'ItemNameEn' => 'Diebold Nexdorf Beetle German All in one Point of sale computer 15 inch', 'ItemName' => 'كمبيوتر الكل في واحد لنقاط البيع 15 بوصة يعمل باللمس من دايبولد نيكسدورف',  'POSTP' => '25000', 'POSPP' => '25000',  'ActiveItem' => 1, 'InStock' => '0', 'GroupCode' => 2],
            ['ItemImage' => "products/11.png",   'latest' => '1', 'bestseller' => '1' ,'ItemNameEn' => 'Elo All in one point of sale computer 14 inch', 'ItemName' => 'كمبيوتر الكل في واحد لنقاط البيع 14 بوصة يعمل باللمس من ايلو',  'POSTP' => '9999', 'POSPP' => '9999',  'ActiveItem' => 1, 'InStock' => '0', 'GroupCode' => 2],
            ['ItemImage' => "products/12.png",   'latest' => '1', 'bestseller' => '1' ,'ItemNameEn' => 'Dell Optiplex POS Ready small PC', 'ItemName' => 'جهاز كمبيوتر لنقاط البيع اوبتيبليكس من ديل',  'POSTP' => '1999', 'POSPP' => '1999',  'ActiveItem' => 1, 'InStock' => 1, 'GroupCode' => 2],
            ['ItemImage' => "products/13.png",   'latest' => '1', 'bestseller' => '1' ,'ItemNameEn' => 'Multipurpose Display', 'ItemName' => 'شاشة متعددة الأغراض',  'POSTP' => '750', 'POSPP' => '750',  'ActiveItem' => 1, 'InStock' => 1, 'GroupCode' => 2],
            ['ItemImage' => "products/14.png",   'latest' => '1', 'bestseller' => '1' ,'ItemNameEn' => 'POSThings Computing kit', 'ItemName' => 'مجموعة الكمبيوتر من بي او اس ثينجز',  'POSTP' => '2999', 'POSPP' => '2999',  'ActiveItem' => 1, 'InStock' => 1, 'GroupCode' => 2],
            ['ItemImage' => "products/15.png",   'latest' => '1', 'bestseller' => '1' ,'ItemNameEn' => 'POSThings Complete POS Starter Kit', 'ItemName' => 'المجموعة الكاملة لنقاط البيع من بي او اس ثينجز',  'POSTP' => '5950', 'POSPP' => '5950',  'ActiveItem' => 1, 'InStock' => 1, 'GroupCode' => 2],
        ];
        foreach($items as $item) {
            Product::create($item);
        }
        // Product::insert($items);
      }
}
