<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\Paginator;
use Validator;
use Exception;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::latest()->paginate(5);
        return view('dashboard.pengguna', ['pengguna' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email:dns|unique:users',
            'username' => 'required|min:3|max:255|unique:users',
            'password' => 'required|min:5|max:255',
            'user_level' => 'required',
            'user_status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('pengguna')
                ->withErrors($validator)
                ->with('error', 'Ada salah satu inputan yang kelewat !!')
                ->withInput();
        }
        try {
            $form = new User();
            $form->name = $request->name;
            $form->email = $request->email;
            $form->username = $request->username;
            $form->password = Hash::make($request->input('password'));
            $form->user_level = $request->user_level;
            $form->user_status = $request->user_status;
            $form->save();

            return redirect('pengguna')->with(
                'success',
                'Pengguna berhasil Di tambahkan'
            );
        } catch (\Exception $e) {
            return redirect('pengguna')->with('error', '' . $e->getMessage());
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect('pengguna')->with(
                'success',
                'Pengguna Berhasil di hapus'
            );
        } else {
            return redirect('pengguna')->with(
                'error',
                'Pengguna Tidak di temukan'
            );
        }
    }
}
