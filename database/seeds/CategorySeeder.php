<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        //Danh mục cha
        DB::table('categories')->insertGetId([
            'c_name' => 'Trang điểm',
            'c_slug' => Str::slug('Trang điểm'),
            'c_parent_id' => 0,
            'c_hot' => 0,
            'c_status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('categories')->insertGetId([
            'c_name' => 'Dưỡng da',
            'c_slug' => Str::slug('Dưỡng da'),
            'c_parent_id' => 0,
            'c_hot' => 0,
            'c_status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insertGetId([
            'c_name' => 'Chăm sóc tóc',
            'c_slug' => Str::slug('Chăm sóc tóc'),
            'c_parent_id' => 0,
            'c_hot' => 0,
            'c_status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insertGetId([
            'c_name' => 'Nước hoa',
            'c_slug' => Str::slug('Nước hoa'),
            'c_parent_id' => 0,
            'c_hot' => 0,
            'c_status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insertGetId([
            'c_name' => 'Chăm sóc cơ thể',
            'c_slug' => Str::slug('Chăm sóc cơ thể'),
            'c_parent_id' => 0,
            'c_hot' => 0,
            'c_status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insertGetId([
            'c_name' => 'Thực phẩm bổ sung',
            'c_slug' => Str::slug('Thực phẩm bổ sung'),
            'c_parent_id' => 0,
            'c_hot' => 0,
            'c_status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('categories')->insertGetId([
            'c_name' => 'Giảm béo',
            'c_slug' => Str::slug('Giảm béo'),
            'c_parent_id' => 0,
            'c_hot' => 0,
            'c_status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //Danh mục con
        //1. Trang điểm
        DB::table('categories')->insertGetId([
            'c_name' => 'Kem nền',
            'c_slug' => Str::slug('Kem nền'),
            'c_parent_id' => 1,
            'c_hot' => 0,
            'c_status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insertGetId([
            'c_name' => 'Kem lót',
            'c_slug' => Str::slug('Kem lót'),
            'c_parent_id' => 1,
            'c_hot' => 0,
            'c_status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insertGetId([
            'c_name' => 'Phấn phủ',
            'c_slug' => Str::slug('Phấn phủ'),
            'c_parent_id' => 1,
            'c_hot' => 0,
            'c_status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //2. Dưỡng da
        DB::table('categories')->insertGetId([
            'c_name' => 'Kem dưỡng da',
            'c_slug' => Str::slug('Kem dưỡng da'),
            'c_parent_id' => 2,
            'c_hot' => 0,
            'c_status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insertGetId([
            'c_name' => 'Sữa rửa mặt',
            'c_slug' => Str::slug('Sữa rửa mặt'),
            'c_parent_id' => 2,
            'c_hot' => 0,
            'c_status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insertGetId([
            'c_name' => 'Sữa tắm',
            'c_slug' => Str::slug('Sữa tắm'),
            'c_parent_id' => 2,
            'c_hot' => 0,
            'c_status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //3. Chăm sóc tóc
        DB::table('categories')->insertGetId([
            'c_name' => 'Trị gầu',
            'c_slug' => Str::slug('Trị gầu'),
            'c_parent_id' => 3,
            'c_hot' => 0,
            'c_status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insertGetId([
            'c_name' => 'Ngăn rụng tóc',
            'c_slug' => Str::slug('Ngăn rụng tóc'),
            'c_parent_id' => 3,
            'c_hot' => 0,
            'c_status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insertGetId([
            'c_name' => 'Giảm dầu nhờn',
            'c_slug' => Str::slug('Giảm dầu nhờn'),
            'c_parent_id' => 3,
            'c_hot' => 0,
            'c_status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //4. Nước hoa
        DB::table('categories')->insertGetId([
            'c_name' => 'Nước hoa nam',
            'c_slug' => Str::slug('Nước hoa nam'),
            'c_parent_id' => 4,
            'c_hot' => 0,
            'c_status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insertGetId([
            'c_name' => 'Nước hoa nữ',
            'c_slug' => Str::slug('Nước hoa nữ'),
            'c_parent_id' => 4,
            'c_hot' => 0,
            'c_status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //5. Chăm sóc cơ thể
        DB::table('categories')->insertGetId([
            'c_name' => 'Muối tắm',
            'c_slug' => Str::slug('Muối tắm'),
            'c_parent_id' => 5,
            'c_hot' => 0,
            'c_status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insertGetId([
            'c_name' => 'Tẩy tế bào chết',
            'c_slug' => Str::slug('Tẩy tế bào chết'),
            'c_parent_id' => 5,
            'c_hot' => 0,
            'c_status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insertGetId([
            'c_name' => 'Dưỡng ẩm toàn thân',
            'c_slug' => Str::slug('Dưỡng ẩm toàn thân'),
            'c_parent_id' => 5,
            'c_hot' => 0,
            'c_status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //6. Thực phẩm bổ sung
        DB::table('categories')->insertGetId([
            'c_name' => 'Sức khỏe',
            'c_slug' => Str::slug('Sức khỏe'),
            'c_parent_id' => 6,
            'c_hot' => 0,
            'c_status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insertGetId([
            'c_name' => 'Làm đẹp',
            'c_slug' => Str::slug('Làm đẹp'),
            'c_parent_id' => 6,
            'c_hot' => 0,
            'c_status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //7. Giảm béo
        DB::table('categories')->insertGetId([
            'c_name' => 'Giảm béo S-line',
            'c_slug' => Str::slug('Giảm béo S-line'),
            'c_parent_id' => 7,
            'c_hot' => 0,
            'c_status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insertGetId([
            'c_name' => 'Giảm béo Hasaki',
            'c_slug' => Str::slug('Giảm béo Hasaki'),
            'c_parent_id' => 7,
            'c_hot' => 0,
            'c_status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
