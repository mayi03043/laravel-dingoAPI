<?php

namespace Database\Seeders;

use App\Models\AdminMenu;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 清空缓存
        app()['cache']->forget('spatie.permission.cache');

        // 添加权限
        foreach(AdminMenu::all() as $item){
            Permission::create(['name'=>$item->route, 'cn_name'=>$item->title, 'guard_name'=>'api']);
            
        }

        // 添加角色
        $role = Role::create(['name'=>'super-admin', 'cn_name'=>'超级管理员', 'guard_name'=>'api']);
        $test = Role::create(['name'=>'test', 'cn_name'=>'测试', 'guard_name'=>'api']);

        // 为角色添加权限
        $role->givePermissionTo(Permission::all());
        $test->givePermissionTo(Permission::find(2));
        
    }
}
