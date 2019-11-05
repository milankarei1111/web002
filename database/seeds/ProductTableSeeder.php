<?php

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //使用模型工廠來填充單表
        factory(Product::class, 1)
        ->create();

        // 使用DB資料迴圈填充
        // for($i=64;$i<=65;$i++){
        //     $data = [
        //         [
        //         'category_id' => '1',
        //         'name' => '[DB商品]'.$i,
        //         'unit' => '個',
        //         'price' => 550+$i,
        //         'specification' => '紅色',
        //         'inventory' => 15,
        //         'safety_stock' => 50,
        //         'image_path' => '/uploads/de34eb50c97225c667234e024167d37b.jpg',
        //         'remark' => '測試填充資料',
        //         'updated_at' => date('Y-m-d H:i:s'),
        //         'created_at' => date('Y-m-d H:i:s'),
        //         ]
        //     ];
        //     DB::table('products')->insert($data);
        // }
    }
}
