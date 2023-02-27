<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\Province;
use App\Models\City;
use App\Models\Employee;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // Users
        User::Create([
            'name' => 'Munawar Ahmad',
            'username' => 'anwar11',
            'email' => 'anwarahmad391@gmail.com',
            'password' => bcrypt('siryu007'),
            'is_admin' => 1
        ]);

        User::Create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin'),
            'is_admin' => 1
        ]);

        User::Create([
            'name' => 'Shinta Purnama',
            'username' => 'shinta',
            'email' => 'shinta96@gmail.com',
            'password' => bcrypt('shinta@123'),
            'is_admin' => 0
        ]);

        // Products
        Product::Create([
            'product_code' => 'BRG-001',
            'product_name' => 'Fanta Stawbery',
            'product_category' => 'Minuman',
            'product_stock' => 250,
            'product_image' => 'fanta.jpg'
        ]);

        Product::Create([
            'product_code' => 'BRG-002',
            'product_name' => 'Indomie Goreng',
            'product_category' => 'Makanan',
            'product_stock' => 500,
            'product_image' => 'mi_goreng.jpg'
        ]);

        Product::Create([
            'product_code' => 'BRG-003',
            'product_name' => 'Pepsodent',
            'product_category' => 'Pasta Gigi',
            'product_stock' => 120,
            'product_image' => 'pepsodent.jpg'
        ]);

        Product::Create([
            'product_code' => 'BRG-004',
            'product_name' => 'Rinso',
            'product_category' => 'Detergen',
            'product_stock' => 155,
            'product_image' => 'rinso.jpg'
        ]);

        Product::Create([
            'product_code' => 'BRG-005',
            'product_name' => 'Sprite',
            'product_category' => 'Minuman',
            'product_stock' => 225,
            'product_image' => 'sprite.jpg'
        ]);

        Product::Create([
            'product_code' => 'BRG-006',
            'product_name' => 'Indomie Soto',
            'product_category' => 'Makanan',
            'product_stock' => 156,
            'product_image' => 'indomie_soto.jpg'
        ]);

        Product::Create([
            'product_code' => 'BRG-007',
            'product_name' => 'Close Up',
            'product_category' => 'Pasta GIgi',
            'product_stock' => 321,
            'product_image' => 'closeup.jpg'
        ]);

        Product::Create([
            'product_code' => 'BRG-008',
            'product_name' => 'Daia',
            'product_category' => 'Detergen',
            'product_stock' => 252,
            'product_image' => 'daia.jpg'
        ]);

        Product::Create([
            'product_code' => 'BRG-009',
            'product_name' => 'Teh Pucuk',
            'product_category' => 'Minuman',
            'product_stock' => 132,
            'product_image' => 'teh_pucuk.jpg'
        ]);

        Product::Create([
            'product_code' => 'BRG-0010',
            'product_name' => 'Oreo',
            'product_category' => 'Makanan',
            'product_stock' => 332,
            'product_image' => 'oreo.jpg'
        ]);

        Product::Create([
            'product_code' => 'BRG-0011',
            'product_name' => 'Kodomo',
            'product_category' => 'Pasta Gigi',
            'product_stock' => 354,
            'product_image' => 'kodomo.jpg'
        ]);

        Product::Create([
            'product_code' => 'BRG-0012',
            'product_name' => 'Jazz One',
            'product_category' => 'Detergen',
            'product_stock' => 120,
            'product_image' => 'jazz_one.jpg'
        ]);

        // Input ke table Province
        Province::create([
            'province_name' => 'DKI Jakarta'
        ]);

        Province::create([
            'province_name' => 'Jawa Barat'
        ]);

        Province::create([
            'province_name' => 'Jawa Timur'
        ]);

        Province::create([
            'province_name' => 'Sumatera Selatan'
        ]);

        // Input ke table City
        City::create([
            'province_id' => '1',
            'city_name' => 'Jakarta Pusat'
        ]);

        City::create([
            'province_id' => '1',
            'city_name' => 'Jakarta Selatan'
        ]);

        City::create([
            'province_id' => '2',
            'city_name' => 'Bandung'
        ]);

        City::create([
            'province_id' => '2',
            'city_name' => 'Bogor'
        ]);

        City::create([
            'province_id' => '3',
            'city_name' => 'Surabaya'
        ]);

        City::create([
            'province_id' => '3',
            'city_name' => 'Sidoarjo'
        ]);

        City::create([
            'province_id' => '4',
            'city_name' => 'Palembang'
        ]);

        City::create([
            'province_id' => '4',
            'city_name' => 'Lahat'
        ]);

        // Input Ke table Employee
        Employee::create([
            'emp_name' => 'Shinta Purnama',
            'emp_religion' => 'Islam',
            'emp_gender' => 'Perempuan',
            'emp_birthdate' => '1996-07-14',
            'emp_adress' => 'Perum BPV, Ciseeng'
        ]);
    }
}
