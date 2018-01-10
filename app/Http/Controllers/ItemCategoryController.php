<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Itemcategories;
use App\Itemtype;

class ItemCategoryController extends Controller
{
    public function index(){
        $types = Itemtype::all();
    	$categories = Itemcategories::all();
    	return view('admin/maintenance/item-category',compact('categories','types'));
    }

	public function save(Request $request){
    	$categories = new Itemcategories;
    	$categories->name = $request->name;
    	$categories->description = $request->description;
        $categories->itemtype_id = $request->itemtype_id;
    	$categories->save();
    	return redirect('/maintenance/item-category');
    }

    public function update(Request $request){
    	$categories = Itemcategories::find($request->id);
    	$categories->name = $request->name;
    	$categories->description = $request->description;
        $categories->itemtype_id = $request->itemtype_id;
    	$categories->save();
    	return redirect('/maintenance/item-category');
    }

    public function delete(Request $request){
    	$categories = Itemcategories::find($request->id);
    	$categories->delete();
    	return redirect('/maintenance/item-category');
    }

    public function getType(Request $request){
    	$categories = Itemcategories::find($request->id);
    	return response()->json($categories);
    }
}
