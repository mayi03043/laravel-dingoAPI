<?php

namespace Database\Seeders;

use App\Models\User;
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
        //
        $user = User::create([
            'name'=>'admin',
            'email'=>'admin@qq.com',
            'password'=>bcrypt('123123')
        ]);
        $test = User::create([
            'name'=>'测试',
            'email'=>'qq@qq.com',
            'password'=>bcrypt('123123')
        ]);

        User::create([
            'name'=>'测试',
            'email'=>'q11111q@qq.com',
            'password'=>bcrypt('123123')
        ]);
        User::create([
            'name'=>'测试',
            'email'=>'q1111q@qq.com',
            'password'=>bcrypt('123123')
        ]);
        User::create([
            'name'=>'测试',
            'email'=>'q111q@qq.com',
            'password'=>bcrypt('123123')
        ]);
        User::create([
            'name'=>'测试',
            'email'=>'q11q@qq.com',
            'password'=>bcrypt('123123')
        ]);
        User::create([
            'name'=>'测试',
            'email'=>'q1q@qq.com',
            'password'=>bcrypt('123123')
        ]);

        $user->assignRole('super-admin');
        $test->assignRole('test');
        
    }
}
