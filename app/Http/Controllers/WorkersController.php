<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Worker;

class WorkersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workers = Worker::all();

        return view('settings.workers_management.index', compact('workers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.workers_management.create');
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
            'handphone_number' => 'required',
        ]);

        $newWorker = new Worker();
        $newWorker->job_id = $request->job_id;
        $newWorker->name = $request->name;
        $newWorker->handphone_number = $request->handphone_number;
        $newWorker->save();

        $destinationPath = 'assets/image/'.$newWorker->id.date('Ymd');

        $filenamePersonalPhoto = $newWorker->id.'_personal.'.$request->personal_photo->getClientOriginalExtension();
        $movePersonalPhoto = $request->personal_photo->move($destinationPath, $filenamePersonalPhoto);
        $newPathPersonalPhoto = $destinationPath.'/'.$filenamePersonalPhoto;

        $filenamePersonalIndentityPhoto = $newWorker->id.'_identity.'.$request->identity_photo->getClientOriginalExtension();
        $movePersonalIndentityPhoto = $request->identity_photo->move($destinationPath, $filenamePersonalIndentityPhoto);
        $newPathPersonalIndentityPhoto = $destinationPath.'/'.$filenamePersonalIndentityPhoto;

        $newPath = Worker::find($newWorker->id);
        $newPath->path_personal_photo = $newPathPersonalPhoto;
        $newPath->path_identity_photo = $newPathPersonalIndentityPhoto;
        $newPath->save();

        return redirect()->route('workers-management.index');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $worker = Worker::find($id);

        return view('settings.workers_management.show', compact('worker'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $worker = Worker::find($id);

        return view('settings.workers_management.edit', compact('worker'));
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
            'handphone_number' => 'required',
        ]);

        $updateWorker = Worker::find($id);
        $updateWorker->job_id = $request->job_id;
        $updateWorker->name = $request->name;
        $updateWorker->handphone_number = $request->handphone_number;
        $updateWorker->save();

        $destinationPath = 'assets/image/'.$updateWorker->id.date('Ymd');
        if($request->hasFile('personal_photo')) {
            $filenamePersonalPhoto = $updateWorker->id.'_personal.'.$request->personal_photo->getClientOriginalExtension();
            $movePersonalPhoto = $request->personal_photo->move($destinationPath, $filenamePersonalPhoto);
            $newPathPersonalPhoto = $destinationPath.'/'.$filenamePersonalPhoto;

            $newPath = Worker::find($updateWorker->id);
            $newPath->path_personal_photo = $newPathPersonalPhoto;
            $newPath->save();
        }
        if($request->hasFile('identity_photo')) {
            $filenamePersonalIndentityPhoto = $updateWorker->id.'_identity.'.$request->identity_photo->getClientOriginalExtension();
            $movePersonalIndentityPhoto = $request->identity_photo->move($destinationPath, $filenamePersonalIndentityPhoto);
            $newPathPersonalIndentityPhoto = $destinationPath.'/'.$filenamePersonalIndentityPhoto;

            $newPath = Worker::find($updateWorker->id);
            $newPath->path_identity_photo = $newPathPersonalIndentityPhoto;
            $newPath->save();
        }

        return redirect()->route('workers-management.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteWorkers = Worker::find($id);
        $deleteWorkers->delete();

        return redirect()->route('workers-management.index');
    }
}
