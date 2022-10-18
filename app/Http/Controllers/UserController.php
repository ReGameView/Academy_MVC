<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.index', [
            'users' => User::all()->toArray()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $user = new User();
        foreach ($user->fieldsToSave as $field) {
            if ($field === 'password') {
                $user->setAttribute('password', Hash::make($request->input('password')));
            } elseif ($request->has($field)) {
                $user->setAttribute($field, $request->input($field));
            } else {
                die("Нет параметра: $field");
            }
        }
        $user->save();

        return redirect(route('user.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param                          $id
     */
    public function update(Request $request, $id)
    {
//        foreach ($user->fieldsToUpdate)

        /** @var User $user */
        $user = User::query()->where('id', '=', $id)->get()[0];

        foreach ($user->fieldsToUpdate as $field) {
            $user->setAttribute($field, $request->input($field));
        }
        $user->save();
        return redirect(route('user.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect(route('user.index'));
    }
}
