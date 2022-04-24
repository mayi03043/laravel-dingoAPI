<?php

namespace Database\Seeders;

use App\Models\AdminMenu;
use Illuminate\Database\Seeder;

class AdminMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // 数据
        $menu = [
            ['mid'=>'1','pid'=>'0','title'=>'系统首页','route'=>'home','hidden'=>'0','url'=>'/home'],
            ['mid'=>'2','pid'=>'0','title'=>'帐号管理','route'=>'users','hidden'=>'0','url'=>'/users'],
            ['mid'=>'3','pid'=>'0','title'=>'角色管理','route'=>'roles','hidden'=>'0','url'=>'/roles'],
            ['mid'=>'4','pid'=>'0','title'=>'菜单管理','route'=>'menu','hidden'=>'0','url'=>'/home'],
            
            ['mid'=>'11','pid'=>'1','title'=>'欢迎页面','route'=>'home.index','hidden'=>'0','url'=>'/home'],

            ['mid'=>'21','pid'=>'2','title'=>'账号列表','route'=>'users.index','hidden'=>'0','url'=>'/users'],
            ['mid'=>'22','pid'=>'2','title'=>'账号创建','route'=>'users.store','hidden'=>'1','url'=>'/users'],
            ['mid'=>'23','pid'=>'2','title'=>'账号查询','route'=>'users.show','hidden'=>'1','url'=>'/users'],
            ['mid'=>'24','pid'=>'2','title'=>'账号更新','route'=>'users.update','hidden'=>'1','url'=>'/users'],
            ['mid'=>'25','pid'=>'2','title'=>'账号删除','route'=>'users.destroy','hidden'=>'1','url'=>'/users'],

            ['mid'=>'31','pid'=>'3','title'=>'角色列表','route'=>'role.index','hidden'=>'0','url'=>'/roles'],
            ['mid'=>'32','pid'=>'3','title'=>'角色创建','route'=>'role.store','hidden'=>'1','url'=>'/roles'],
            ['mid'=>'33','pid'=>'3','title'=>'角色查询','route'=>'role.show','hidden'=>'1','url'=>'/roles'],
            ['mid'=>'34','pid'=>'3','title'=>'角色更新','route'=>'role.update','hidden'=>'1','url'=>'/roles'],
            ['mid'=>'35','pid'=>'3','title'=>'角色删除','route'=>'role.destroy','hidden'=>'1','url'=>'/roles'],

            ['mid'=>'41','pid'=>'4','title'=>'菜单列表','route'=>'menus.index','hidden'=>'0','url'=>'/menus'],
            ['mid'=>'42','pid'=>'4','title'=>'菜单创建','route'=>'menus.store','hidden'=>'1','url'=>'/menus'],
            ['mid'=>'43','pid'=>'4','title'=>'菜单查询','route'=>'menus.show','hidden'=>'1','url'=>'/menus'],
            ['mid'=>'44','pid'=>'4','title'=>'菜单更新','route'=>'menus.update','hidden'=>'1','url'=>'/menus'],
            ['mid'=>'45','pid'=>'4','title'=>'菜单删除','route'=>'menus.destroy','hidden'=>'1','url'=>'/menus'],

            
            
            
           

           


            
        ];

        // 填充数据库
        foreach($menu as $iten){
            AdminMenu::create($iten);
        }
        
    }
}
