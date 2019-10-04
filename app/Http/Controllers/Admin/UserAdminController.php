<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Role;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;

class UserAdminController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->orderByDesc('id')->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User;
        $roles = Role::pluck('display_name', 'id');

        return view('admin.users.create', compact('user', 'roles'));
    }

    public function store(Request $request)

    {

        $data = $request->validate([
            'name' => 'required',
            'email' => 'email|required|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        $parseName = strtolower(str_replace(["á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", " "], ["a", "e", "i", "o", "u", "A", "E", "I", "O", "U", ""], $request->name));

        if ($request->file('image')){
            $image = $request->file('image')->storeAs(
                'public/users', $request->id . $parseName .'.jpg'
            );
            $data['image'] = $image;
        }


        $user = User::create($data);

        $user->roles()->attach($request->roles);

        return redirect()->route('usuarios.index')->with('info', 'Hemos recibido tus mensajes');
    }


    public function edit($id)
    {

        $user = User::findOrFail($id);

        $this->authorize($user);

        $roles = Role::pluck('display_name', 'id');

        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {

        $user = User::findOrFail($id);

        $this->authorize($user);


        $data = $request->validate([
            'name' => 'required',
            'email' => 'email|required|unique:users,email'
        ]);

        $user->update($data);

        return redirect()->route('usuarios.edit', $id);
    }

    public function destroy($id)
    {

        User::findOrFail($id)->delete();

        return redirect()->route('usuarios.index');
    }
}
