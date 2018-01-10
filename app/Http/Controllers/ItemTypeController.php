<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Itemtype;

class ItemTypeController extends Controller
{
    public function index(){
    	$types = Itemtype::all();
    	return view('admin/maintenance/item-type',compact('types'));
    }

    public function save(Request $request){
    	$types = new Itemtype;
    	$types->name = $request->name;
    	$types->description = $request->description;
    	$types->save();
    	return redirect('/maintenance/item-type');
    }

    public function update(Request $request){
    	$types = Itemtype::find($request->id);
    	$types->name = $request->name;
    	$types->description = $request->description;
    	$types->save();
    	return redirect('/maintenance/item-type');
    }

    public function delete(Request $request){
    	$types = Itemtype::find($request->id);
    	$types->delete();
    	return redirect('/maintenance/item-type');
    }

    public function getType(Request $request){
    	$types = Itemtype::find($request->id);
    	return response()->json($types);
    }
}
