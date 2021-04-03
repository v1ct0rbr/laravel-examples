<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStaffRequest;
use App\Models\Photo;
use App\Models\Staff;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staff::all();
        return view('/staff-list', compact('staff'));

        // return view('/welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStaffRequest $request)
    {
        //
        $validated = $request->validated();
        try {
            $staff = new Staff(["name" => $request->name, 'email' => $request->email]);
            $staff->save();
            $staff->photo()->save(new Photo(['path' => $request->path]));
            return redirect()->route('staff.index')->with('message', __('messages.success_operation'));
        } catch (Exception $e) {
            return back()->with('error', [['title' => __('messages.error_operation'), 'details' => $e->getMessage()]]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = Staff::find($id);
        return view('staff-update', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreStaffRequest $request, $id)
    {
        //
        $validated = $request->validated();
        try {
            $staff = Staff::find($id);
            $staff->name = $request->name;
            $staff->email = $request->email;
            $staff->update();
            $staff->photo()->update(['path' => $request->path]);
            return redirect()->route('staff.index')->with('message', __('messages.success_operation'));
        } catch (Exception $e) {
            return back()->with('error', [['title' => __('messages.error_operation'), 'details' => $e->getMessage()]]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
