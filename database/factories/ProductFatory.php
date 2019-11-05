<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        //
        'category_id' => $faker->numberBetween(1,5),
        'name' => '[商品名]'.$faker->country(),
        'unit' => '個',
        'price' => $faker->randomFloat(2, 1, 10000),
        'specification' => '[規格]'.$faker->colorName(),
        'inventory' => $faker->numberBetween(1, 30), //生成隨機整數，範圍是1-30之間
        'safety_stock' => $faker->numberBetween(1, 50), //生成隨機整數，範圍是1-50之間
        // 'image_path' => $faker->image('public/uploads',400, 300), // 無法產生圖片
        'image_path' => $faker->imageUrl(), // 產生圖片url
        'remark' => '[備註]'.$faker->bs(), // 返回一段文本，最多只能含有200個字符
    ];
});
