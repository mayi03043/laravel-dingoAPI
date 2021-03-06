<?php

namespace App\Transformers;

use Spatie\Permission\Models\Role;
use League\Fractal\TransformerAbstract;


class RoleTransformer extends TransformerAbstract
{
    public function transform(Role $role){

        return [
            'id'=> $role->id,
            'name'=> $role->name,
            'cn_name'=> $role->cn_name,
            'guard_name'=> $role->guard_name,
            
            
        ];
    }
}