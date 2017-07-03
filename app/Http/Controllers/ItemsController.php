<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;
use DB;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DB::table('items')
                ->join('categories', 'items.category_id', '=', 'categories.id')
                ->select('categories.*', 'categories.name as category_name', 'items.*', 'items.name as item_name')
                ->get();

        return view('settings.items_management.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('settings.items_management.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
        ]);

        $newItem = new Item();
        $newItem->name = $request->name;
        $newItem->category_id = $request->category_id;
        $newItem->production_id = $request->production_id;
        $newItem->price = $request->price;
        $newItem->save();

        return redirect()->route('items-management.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = DB::table('items')
                ->join('categories', 'items.category_id', '=', 'categories.id')
                ->select('categories.*', 'categories.name as category_name', 'items.*', 'items.name as item_name')
                ->where('items.id', $id)
                ->first();

        return view('settings.items_management.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        $categories = Category::all();

        return view('settings.items_management.edit', compact('item','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
        ]);

        $updateItem = Item::find($id);
        $updateItem->name = $request->name;
        $updateItem->category_id = $request->category_id;
        $updateItem->production_id = $request->production_id;
        $updateItem->price = $request->price;
        $updateItem->save();

        return redirect()->route('items-management.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteItem = Item::find($id);
        $deleteItem->delete();

        return redirect()->route('items-management.index');
    }
}
