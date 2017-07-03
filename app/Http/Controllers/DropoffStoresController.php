<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DropoffStore;

class DropoffStoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dropoff_stores = DropoffStore::all();

        return view('settings.dropoff_stores_management.index', compact('dropoff_stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.dropoff_stores_management.create');
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
            'address' => 'required',
            'handphone_number' => 'required'
        ]);

        $newDropoffStore = new DropoffStore();
        $newDropoffStore->name = $request->name;
        $newDropoffStore->address = $request->address;
        $newDropoffStore->handphone_number = $request->handphone_number;
        $newDropoffStore->save();

        return redirect()->route('dropoff-stores-management.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dropoff_store = DropoffStore::find($id);

        return view('settings.dropoff_stores_management.show', compact('dropoff_store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dropoff_store = DropoffStore::find($id);

        return view('settings.dropoff_stores_management.edit', compact('dropoff_store'));
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
            'address' => 'required',
            'handphone_number' => 'required'
        ]);

        $updateDropoffStore = DropoffStore::find($id);
        $updateDropoffStore->name = $request->name;
        $updateDropoffStore->address = $request->address;
        $updateDropoffStore->handphone_number = $request->handphone_number;
        $updateDropoffStore->save();

        return redirect()->route('dropoff-stores-management.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteDropoffStore = DropoffStore::find($id);
        $deleteDropoffStore->delete();

        return redirect()->route('dropoff-stores-management.index');
    }
}
