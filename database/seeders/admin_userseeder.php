<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class admin_userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdminUser::create([
            'fullname' => 'Abdul Muiz Bin Eddy',
            'email' => 'muiz.eddy0@gmail.com',
            'password' => Hash::make('123456'),
        ]);
        //
    }
}
