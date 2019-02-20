<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;

class RestauService
{

    public function UserRestoAndTables()
    {

        return Auth::user()
            ->resturants()
            ->get();
    }
}
