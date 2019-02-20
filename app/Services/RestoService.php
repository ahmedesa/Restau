<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;

class RestoService
{

    public function UserRestoAndTables()
    {

        return Auth::user()
            ->resturants()
            ->get();
    }
}
