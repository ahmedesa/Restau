<?php
namespace App\Services;

use App\Menu;

class MenuService
{

    public function GetMenuWithCategory($restoId)
    {

        return Menu::where('restau_id', $restoId)
            ->get()
            ->groupBy('category.name');
    }
}
