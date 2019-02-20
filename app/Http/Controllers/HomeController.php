<?php

namespace App\Http\Controllers;

use App\Services\MenuService;
use App\Services\RestauService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(MenuService $service ,RestauService $restService)
    {
        
        $restau_id = 1;
        $menus= $service->GetMenuWithCategory($restau_id);
        $restaus = $restService->UserRestoAndTables();
        return view('home',compact('menus','restau_id','restaus'));
    }
}
