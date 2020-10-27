<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('users')->truncate();
        DB::table('users')->insert([
            'name' => 'user1',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('11111111'),
            'phone' =>'0983906329',
            'address' => 'Hà Nội',
            'code_active' => bcrypt(md5(time() . $faker->email)),
            'time_active' => now(),
            'active' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'user2',
            'email' => 'user2@gmail.com',
            'password' => bcrypt('11111111'),
            'phone' =>'0862898569',
            'address' => 'Hà Nam',
            'code_active' => bcrypt(md5(time() . $faker->email)),
            'time_active' => now(),
            'active' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'user3',
            'email' => 'user3@gmail.com',
            'password' => bcrypt('11111111'),
            'phone' =>'0967200000',
            'address' => 'Thái Nguyên',
            'code_active' => bcrypt(md5(time() . $faker->email)),
            'time_active' => now(),
            'active' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'user4',
            'email' => 'user4@gmail.com',
            'password' => bcrypt('11111111'),
            'phone' =>'0965951111',
            'address' => 'Thái Bình',
            'code_active' => bcrypt(md5(time() . $faker->email)),
            'time_active' => now(),
            'active' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'user5',
            'email' => 'user5@gmail.com',
            'password' => bcrypt('11111111'),
            'phone' =>'0935190000',
            'address' => 'Kon Tum',
            'code_active' => bcrypt(md5(time() . $faker->email)),
            'time_active' => now(),
            'active' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'user6',
            'email' => 'user6@gmail.com',
            'password' => bcrypt('11111111'),
            'phone' => '0943960000',
            'address' => 'Hà Tĩnh',
            'code_active' => bcrypt(md5(time() . $faker->email)),
            'time_active' => now(),
            'active' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'user7',
            'email' => 'user7@gmail.com',
            'password' => bcrypt('11111111'),
            'phone' => '0862693599',
            'address' => 'Hà Nam',
            'code_active' => bcrypt(md5(time() . $faker->email)),
            'time_active' => now(),
            'active' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'user8',
            'email' => 'user8@gmail.com',
            'password' => bcrypt('11111111'),
            'phone' => '0373078264',
            'address' => 'Quảng Trị',
            'code_active' => bcrypt(md5(time() . $faker->email)),
            'time_active' => now(),
            'active' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'user9',
            'email' => 'user9@gmail.com',
            'password' => bcrypt('11111111'),
            'phone' => '0396440628',
            'address' => 'Nghệ An',
            'code_active' => bcrypt(md5(time() . $faker->email)),
            'time_active' => now(),
            'active' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'user10',
            'email' => 'user10@gmail.com',
            'password' => bcrypt('11111111'),
            'phone' =>'0378947784',
            'address' => 'Hà Nội',
            'code_active' => bcrypt(md5(time() . $faker->email)),
            'time_active' => now(),
            'active' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'user11',
            'email' => 'user11@gmail.com',
            'password' => bcrypt('11111111'),
            'phone' =>'0372337906',
            'address' => 'Bạc Liêu',
            'code_active' => bcrypt(md5(time() . $faker->email)),
            'time_active' => now(),
            'active' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'user12',
            'email' => 'user12@gmail.com',
            'password' => bcrypt('11111111'),
            'phone' =>'0392649847',
            'address' => 'Bảo Lộc',
            'code_active' => bcrypt(md5(time() . $faker->email)),
            'time_active' => now(),
            'active' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'user13',
            'email' => 'user13@gmail.com',
            'password' => bcrypt('11111111'),
            'phone' =>'0396790972',
            'address' => 'Bắc Giang',
            'code_active' => bcrypt(md5(time() . $faker->email)),
            'time_active' => now(),
            'active' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'user14',
            'email' => 'user14@gmail.com',
            'password' => bcrypt('11111111'),
            'phone' =>'0386658157',
            'address' => 'Bắc Ninh',
            'code_active' => bcrypt(md5(time() . $faker->email)),
            'time_active' => now(),
            'active' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'user15',
            'email' => 'user15@gmail.com',
            'password' => bcrypt('11111111'),
            'phone' =>'0384281531',
            'address' => 'Bến Tre',
            'code_active' => bcrypt(md5(time() . $faker->email)),
            'time_active' => now(),
            'active' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'user16',
            'email' => 'user16@gmail.com',
            'password' => bcrypt('11111111'),
            'phone' =>'0383870531',
            'address' => 'Biên Hòa',
            'code_active' => bcrypt(md5(time() . $faker->email)),
            'time_active' => now(),
            'active' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'user17',
            'email' => 'user17@gmail.com',
            'password' => bcrypt('11111111'),
            'phone' =>'0389210431',
            'address' => 'Cà Mau',
            'code_active' => bcrypt(md5(time() . $faker->email)),
            'time_active' => now(),
            'active' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'user18',
            'email' => 'user18@gmail.com',
            'password' => bcrypt('11111111'),
            'phone' =>'0394701365',
            'address' => 'Cao Bằng',
            'code_active' => bcrypt(md5(time() . $faker->email)),
            'time_active' => now(),
            'active' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'user19',
            'email' => 'user19@gmail.com',
            'password' => bcrypt('11111111'),
            'phone' =>'0378958465',
            'address' => 'Đà Lạt',
            'code_active' => bcrypt(md5(time() . $faker->email)),
            'time_active' => now(),
            'active' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'user20',
            'email' => 'user20@gmail.com',
            'password' => bcrypt('11111111'),
            'phone' =>'0362539923',
            'address' => 'Hà Giang',
            'code_active' => bcrypt(md5(time() . $faker->email)),
            'time_active' => now(),
            'active' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
