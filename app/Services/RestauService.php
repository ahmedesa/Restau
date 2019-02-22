<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;

class RestauService
{

    public function UserRestauAndTables()
    {

        return Auth::user()
            ->restaurants()
            ->get();
    }
}
