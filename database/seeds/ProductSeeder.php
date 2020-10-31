<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('products')->truncate();
//        DB::table('products_attributes')->truncate();

        //category -> trang điểm:  kem nền : 8
        DB::table('products')->insertGetId([
            'pro_name' => 'Kem Nền Maybelline Mịn Nhẹ Kiềm Dầu Chống Nắng',
            'pro_slug' => Str::slug('Kem Nền Maybelline Mịn Nhẹ Kiềm Dầu Chống Nắng'),
            'pro_price' => 970000,
            'pro_category_id' => 8,
            'pro_sale' => 10,
            'pro_view' => rand(1,100),
            'pro_hot' =>rand(0,1),
            'pro_active' => 1,
            'pro_pay' => rand(1,10),
            'pro_description' => 'Kem Nền Maybelline Mịn Nhẹ Kiềm Dầu Chống Nắng',
            'pro_review_star' => rand(10,50),
            'pro_review_total' => rand(1,10),
            'pro_number' =>rand(10,100),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insertGetId([
            'pro_name' => 'Kem Nền Mịn Lì Maybelline',
            'pro_slug' => Str::slug('Kem Nền Mịn Lì Maybelline'),
            'pro_price' => 135000,
            'pro_category_id' => 8,
            'pro_sale' => 50,
            'pro_view' => rand(1,100),
            'pro_hot' =>rand(0,1),
            'pro_active' => 1,
            'pro_pay' => rand(1,10),
            'pro_description' => 'Kem Nền Mịn Lì Maybelline',
            'pro_review_star' => rand(10,50),
            'pro_review_total' => rand(1,10),
            'pro_number' =>rand(10,100),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insertGetId([
            'pro_name' => 'Kem Nền MAC Kiềm Dầu SPF',
            'pro_slug' => Str::slug('Kem Nền MAC Kiềm Dầu SPF'),
            'pro_price' => 970000,
            'pro_category_id' => 8,
            'pro_sale' => 10,
            'pro_view' => rand(1,100),
            'pro_hot' =>rand(0,1),
            'pro_active' => 1,
            'pro_pay' => rand(1,10),
            'pro_description' => 'Kem Nền MAC Kiềm Dầu SPF',
            'pro_review_star' => rand(10,50),
            'pro_review_total' => rand(1,10),
            'pro_number' =>rand(10,100),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insertGetId([
            'pro_name' => 'Kem Trang Điểm BB Chống Nắng Anessa',
            'pro_slug' => Str::slug('Kem Trang Điểm BB Chống Nắng Anessa'),
            'pro_price' => 280000,
            'pro_category_id' => 8,
            'pro_sale' => 10,
            'pro_view' => rand(1,100),
            'pro_hot' =>rand(0,1),
            'pro_active' => 1,
            'pro_pay' => rand(1,10),
            'pro_description' => 'Kem Trang Điểm BB Chống Nắng Anessa',
            'pro_review_star' => rand(10,50),
            'pro_review_total' => rand(1,10),
            'pro_number' =>rand(10,100),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insertGetId([
            'pro_name' => 'Kem Nền Lâu Trôi',
            'pro_slug' => Str::slug('Kem Nền Lâu Trôi'),
            'pro_price' => 200000,
            'pro_category_id' => 8,
            'pro_sale' => 50,
            'pro_view' => rand(1,100),
            'pro_hot' =>rand(0,1),
            'pro_active' => 1,
            'pro_pay' => rand(1,10),
            'pro_description' => 'Kem Nền Lâu Trôi',
            'pro_review_star' => rand(10,50),
            'pro_review_total' => rand(1,10),
            'pro_number' =>rand(10,100),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
