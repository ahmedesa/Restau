<?php

namespace App\Http\Controllers;

use App\Services\RestauService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
	public function index(RestauService $restService)
	{
	    $restaus = $restService->UserRestauAndTables();
		return view('restau.index',compact('restaus'));
	}
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|min:3',
            'location' => 'required|min:3',
            'tables' => 'required|integer',
        ]);
        $restau = Auth::user()->restaurants()->create($data);
        return response()->json($restau);
    }
}
