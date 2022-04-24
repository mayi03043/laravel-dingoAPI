<?php

namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;


class UserTransformer extends TransformerAbstract
{
    public function transform(User $user){
        $role = $this->getRole($user);
        return [
            'id'=> $user->id,
            'name'=> $user->name,
            'email'=> $user->email,
            'logintime'=> $user->logintime,
            'status'=> $user->status,
            'role'=> $role,
            
        ];
    }

    private function getRole(User $user){

       return $user->roles->pluck('cn_name');

    }
}