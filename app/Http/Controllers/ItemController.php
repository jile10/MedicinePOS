<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Itemtype;
use App\Itemcategories;
use App\Item;
use Image;
use Illuminate\Support\Facades\Storage;
class ItemController extends Controller
{
    public function index(){
    	$types = Itemtype::all();
    	$items = Item::all();
    	$categories = Itemcategories::all();
    	// echo $types;
    	return view('admin/maintenance/item',compact('types','items','categories'));
    }

    public function save(Request $request)
    {	
    	$item = new Item;
    	if($request->hasFile('avatar'))
    	{
    		$image = $request->file('avatar');
    		$filename = time() . '.' . $image->getClientOriginalExtension();
    		Image::make($image)->resize(200, 200)->save( public_path('/images/'. $filename));
    		$item->image = $filename;
    	}
    	$item->name = $request->name;
    	$item->description = $request->description;
		$item->itemtype_id = $request->itemtype_id;
		$item->itemcategory_id = $request->itemcategory_id;
		$item->new_price = $request->price;
		$item->save();
		return redirect('/maintenance/item');
    }

    public function update(Request $request)
    {	
    	$item = Item::find($request->id);
    	if($request->hasFile('avatar'))
    	{
    		if($item->image != "med.png")
    			unlink(public_path()."/images/".$item->image);
    		$image = $request->file('avatar');
    		$filename = time() . '.' . $image->getClientOriginalExtension();
    		Image::make($image)->resize(200, 200)->save( public_path('/images/'. $filename));
    		$item->image = $filename;
    	}
    	$item->name = $request->name;
    	$item->description = $request->description;
		$item->itemtype_id = $request->itemtype_id;
		$item->itemcategory_id = $request->itemcategory_id;
		if($item->new_price != $request->price){
			$item->old_price = $item->new_price;
			$item->new_price = $request->price;
		}
		$item->save();
		return redirect('/maintenance/item');
    }


    public function delete(Request $request){
    	$item = Item::find($request->id);
		if($item->image != "med.png")
			unlink(public_path()."/images/".$item->image);
    	$item->delete();
    	return redirect('/maintenance/item');
    }

    public function addStock(Request $request){
    	$item = Item::find($request->id);
    	$item->stocks = $request->stocks;
		$item->save();
    	return redirect('/maintenance/item');
    }

    public function getType(Request $request){
    	$category = Itemcategories::where('itemtype_id','=',$request->id)->get();
    	return response()->json($category);
    }

    public function getItem(Request $request){
    	$item = Item::find($request->id);
    	$category  = Itemcategories::find($item->itemcategory_id);
    	return response()->json($item);
    }
}
