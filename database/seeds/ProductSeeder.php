<?php

use App\Group;
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
            ['ItemName' => 'دهن عود هندي قديم', 'ItemImage' => 'products/saud/01.jpg', 'ItemDesc' => '', 'price' => '', 'GroupCode' => 1, 'PackageSize' => 'ربع توله'],
            ['ItemName' => 'دهن عود تراد', 'ItemImage' => 'products/saud/02.jpg', 'ItemDesc' => '', 'price' => '', 'GroupCode' => 1, 'PackageSize' => 'ربع توله'],
            ['ItemName' => 'دهن عود تايلندي نادر', 'ItemImage' => 'products/saud/03.jpg', 'ItemDesc' => '', 'price' => '', 'GroupCode' => 1, 'PackageSize' => 'ربع توله'],
            ['ItemName' => 'دهن عود الكلمنتان', 'ItemImage' => 'products/saud/04.jpg', 'ItemDesc' => '', 'price' => '', 'GroupCode' => 1, 'PackageSize' => 'ربع توله'],
            ['ItemName' => 'دهن عود الترات', 'ItemImage' => 'products/saud/05.jpg', 'ItemDesc' => '', 'price' => '', 'GroupCode' => 1, 'PackageSize' => 'ربع توله'],
            ['ItemName' => 'الهندي مع الورد الطائفي', 'ItemImage' => 'products/saud/06.jpg', 'ItemDesc' => '', 'price' => '', 'GroupCode' => 1, 'PackageSize' => 'ربع توله'],
            ['ItemName' => 'عود موروكي طبيعي', 'ItemImage' => 'products/saud/07.jpg', 'ItemDesc' => '', 'price' => '', 'GroupCode' => 2, 'PackageSize' => 'ربع توله'],
            ['ItemName' => 'Mid night', 'ItemImage' => 'products/saud/08.jpg', 'ItemDesc' => 'معطرات المنزل', 'price' => '100 rs', 'GroupCode' => 3, 'PackageSize' => '500 ml'],
            ['ItemName' => 'Comfort', 'ItemImage' => 'products/saud/09.jpg', 'ItemDesc' => 'معطرات المنزل', 'price' => '100 rs', 'GroupCode' => 3, 'PackageSize' => '500 ml'],
            ['ItemName' => 'معمل ملكي', 'ItemImage' => 'products/saud/10.jpg', 'ItemDesc' => '', 'price' => '', 'GroupCode' => 2, 'PackageSize' => ''],
            ['ItemName' => 'البندري', 'ItemImage' => 'products/saud/11.jpg', 'ItemDesc' => '', 'price' => '', 'GroupCode' => 3, 'PackageSize' => '50 ml'],
            ['ItemName' => 'SARA TERA', 'ItemImage' => 'products/saud/12.jpg', 'ItemDesc' => '', 'price' => '', 'GroupCode' => 3, 'PackageSize' => '50 ml'],
            ['ItemName' => 'مبثوث', 'ItemImage' => 'products/saud/13.jpg', 'ItemDesc' => '', 'price' => '', 'GroupCode' => 2, 'PackageSize' => ''],
            ['ItemName' => '1959', 'ItemImage' => 'products/saud/14.jpg', 'ItemDesc' => '', 'price' => '', 'GroupCode' => 3, 'PackageSize' => '50 ml'],
            ['ItemName' => 'LAVA OUD', 'ItemImage' => 'products/saud/15.jpg', 'ItemDesc' => '', 'price' => '', 'GroupCode' => 3, 'PackageSize' => '50 ml'],
        ];;


        foreach ($items as $index => $item) {


            $item['ItemNameEn'] = $item['ItemName'];
            $item['InStock'] = true;
            $item['price'] = rand(100, 200);
            if ($index < 5) $item['featured'] = true;
            if ($index < 10 && $index > 5) $item['bestseller'] = true;
            if ($index < 15 && $index > 10) $item['latest'] = true;

            Product::create($item);
        }
        // Product::insert($items);
    }
}
