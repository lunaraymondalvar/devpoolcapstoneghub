<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;
use Auth;
use Session;

class ItemController extends Controller
{
   	public function showItems() {
   		$categories = Category::all();
   		$items = Item::all();
   	 	return view('items.catalog', compact(['categories', 'items']));
    }

    public function showAddItemForm(){
     	$categories = Category::all();

    	return view('items.add_items', compact('categories'));
    }
}
