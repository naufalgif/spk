<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\AdminModel::insert([
            [
                'nama' =>'Admin',
                'email' =>'admin123@gmail.com',
                'password' =>bcrypt('12345'),
                'created_at' =>\Carbon\Carbon::now('Asia/Jakarta')
            ],
        ]);
    }
    
}
