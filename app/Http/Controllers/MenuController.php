<?php

namespace App\Http\Controllers;

use App\Category;
use App\Menu;
use App\Rules\RestoCategoryValidate;
use App\Services\MenuService;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index($id)
    {
        $restau_id = $id ;
        $service =new MenuService;
        $menus= $service->GetMenuWithCategory($id);
        return view('menu.index',compact('menus','restau_id'));
    }
    public function store(Request $request)
    {

        $data = $this->validate($request, [
            'restau_id'   => 'required|numeric',
            'price'       => 'required|numeric',
            'name'        => 'required',
            'description' => 'required',
            'category'    => ['required', new RestoCategoryValidate($request->restau_id)],
        ]
        );
        $category = Category::where('restau_id',$data['restau_id'])->where('name',$data['category'])->first();
		$menu=Menu::create([
            'restau_id'   => $data['restau_id'],
            'price'       => $data['price'],
            'name'        => $data['name'],
            'category_id' => $category->id,
            'description' => $data['description'],
        ]);
        return response()->json($menu,201);
    }
}
