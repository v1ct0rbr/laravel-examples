<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('/users-list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('users-create', ['userRoles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();

        try {
            $roles = Role::where('id', 'in', $request->roles);
            $user = new User(['name' => $request->name, 'email' => $request->email, 'password' => bcrypt('mudar')]);
            $user->save();
            // $user->roles()->attach($request->roles);
            $user->roles()->sync($request->roles);


            return redirect()->route('users.index')->with('message', __('messages.success_operation'));
        } catch (Exception $e) {
            return back()->with("error", [['title' => __('messages.error_operation'), 'details' => $e->getMessage()]]);
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
        $user = User::find($id);
        $user_roles_ids = [];

        foreach ($user->roles as $value) {
            # code...
            $user_roles_ids[] = $value->id;
        }

        $roles = Role::all();

        if(is_array(old('roles'))){
            foreach ($roles as $key => $value) {
                          
                if (in_array($value->id, old('roles')))
                    $roles[$key]->checked = true;
                else
                    $roles[$key]->checked = false;
            }
        }else{
            foreach ($roles as $key => $value) {
                              
                if (in_array($value->id, $user_roles_ids))
                    $roles[$key]->checked = true;
                else
                    $roles[$key]->checked = false;
            }
        }
        



        return view('users-update', ['user' => $user, 'roles' => $roles, 'user_roles' => $user_roles_ids]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserRequest $request, $id)
    {
        $validated = $request->validated();
        $user = User::find($id);

        try {

            $user->update(['name' => $request->name, 'email' => $request->email]);
            $user->save();
            // $user->roles()->attach($request->roles);
            $user->roles()->sync($request->roles);


            return redirect()->route('users.index')->with('message', __('messages.success_operation'));
        } catch (Exception $e) {
            return back()->with("error", [['title' => __('messages.error_operation'), 'details' => $e->getMessage()]]);
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
        User::destroy($id);
        return redirect()->route('users.index')->with('success', 'Excluído com sucesso');
    }
}
