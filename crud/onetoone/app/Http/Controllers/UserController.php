<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\Address;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users-list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users-create')->with('title', 'Cadastro de Usuários');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        /*   'title' => ['required', 'unique:posts', 'max:255'],
    'body' => ['required'], */
        $validated = $request->validated();
        try {

            $user = new User(['name' => $request->name, 'email' => $request->email, 'password' => bcrypt('teste123')]);
            $address = new Address([
                'street' => $request->street, 'number' => $request->number,
                'complement' => $request->complement,
                'postal_code' => $request->postal_code
            ]);
            $user->save();
            $user->address()->save($address);
        } catch (Exception $e) {

            return back()->with("error", [['title' => __('messages.error_operation'), 'details' => $e->getMessage()]]);
        }

        return redirect()->route('users.edit', ['user' => $user->id])->with('success', __('messages.success_operation'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return $user;
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
        if ($user) {
            return view('users-update', ['user' => $user]);
        }
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
        try {
            $user = User::find($id);
            $user->update(['name' => $request->name, 'email' => $request->email]);
            $user->address()->update([
                'street' => $request->street, 'number' => $request->number,
                'complement' => $request->complement,
                'postal_code' => $request->postal_code
            ]);
        } catch (Exception $e) {

            return back()->with("error", [['title' => __('messages.error_operation'), 'details' => $e->getMessage()]]);
        }

        return redirect()->route('users.edit', ['user' => $user->id])->with('success', __('messages.success_operation'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            User::destroy($id);
            return redirect()->route('users.index')->with('success', __('messages.success_operation'));
        } catch (Exception $e) {
            redirect()->route('users.index')->with(
                'error',
                [[
                    'title' => __('messages.error_operation'),
                    'details' => $e->getMessage()
                ]]
            );
        }
    }

    public function save()
    {
        error_log('=================================teste');
        $user = new User(['name' => 'Victor', 'email' => 'victorhenrique.jp@gmail.com', 'password' => bcrypt('teste123')]);
        $address = new Address(['street' => 'Rua teste', 'number' => 1234, 'postal_code' => '234234-23']);

        $user->save();

        $user->address()->save($address);
    }
}
