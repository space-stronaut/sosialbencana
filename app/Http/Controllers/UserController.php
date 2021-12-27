<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

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

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatans = Kecamatan::all();
        $roles = Role::all();

        return view('user.create', compact('kecamatans', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'kecamatan_id' => $request->kecamatan_id
        ]);

        $user->assignRole([$request->roles[0]]);

        return redirect()->route('user.index');
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
        $kecamatans = Kecamatan::all();
        $roles = Role::all();
        $user = User::find($id);

        return view('user.edit', compact('kecamatans', 'roles', 'user'));
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
        $user = User::find($id);

        if ($request->password) {
             User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'kecamatan_id' => $request->kecamatan_id
            ]);

            $user->assignRole([$request->roles[0]]);
        }else{
            User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $user->password,
                'kecamatan_id' => $request->kecamatan_id
            ]);

            $user->assignRole([$request->roles[0]]);
        }

        return redirect()->route('user.index');
        // dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->back();
    }
}
