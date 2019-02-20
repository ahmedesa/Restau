<?php

namespace App\Http\Controllers;

use App\Category;
use App\Menu;
use App\Rules\RestoCategoryValidate;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function create(Request $request)
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
