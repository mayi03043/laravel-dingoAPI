<?php

namespace App\Models;

use App\Models\AdminMenu as ModelsAdminMenu;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminMenu extends Model
{
    use HasFactory;

    public function children()
    {
        return $this->hasMany(ModelsAdminMenu::class,'pid','mid');
    }
}
