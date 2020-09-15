<?php

use App\danhmuc;
use App\sanpham;
use Illuminate\Database\Seeder;

class SanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create('vi_VN');
        $limit = 100;
        $danhmucIds = danhmuc::all()->pluck('id')->toArray();
        for ($i = 0; $i < $limit; $i++) {
            sanpham::insert([
                'ten_sp' => $faker->name(),
                'hinh_anh' => $faker->imageUrl(),
                'danhmuc_id' => $faker->randomElement($danhmucIds),
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        }


    }
}
