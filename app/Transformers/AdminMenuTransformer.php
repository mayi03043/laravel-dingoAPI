<?php

namespace App\Transformers;

use App\Models\AdminMenu;
use League\Fractal\TransformerAbstract;


class AdminMenuTransformer extends TransformerAbstract
{
    public function transform(AdminMenu $menu){
        $arr = $this->menuShow($menu);
        
        return [
            'id'=> $menu->id,
            'title' => $menu->title,
            'icon' => $menu->icon,
            'url' => $menu->url,
            'children' => $arr,
        ];
    }

    private function menuShow(AdminMenu $menu){
        
        return $menu->children->where('hidden',0)->where('status',0);

    }
}