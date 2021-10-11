<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;

class UserController extends BaseController
{
    public static function index()
    {
        return User::all();
    }

    public static function show($id)
    {
        return User::findOrFail($id);
    }

    public static function login($request)
    {
        return User::where(
            'user', $request->user
        )
        ->where(
            'pass', md5($request->pass)
        )
        ->first();
    }

    public static function store($request)
    {
        return UserController::show(
            User::insertGetId
            (
                [
                    'user' => $request->user,
                    'pass' => md5($request->pass),
                    'privilege_id' => $request->privilege_id
                ]
            )
        );
    }

    public static function edit($request)
    {
        return User::where('id', $request->id)
            ->update(
            [
                'user' => $request->user,
                'pass' => md5($request->pass),
                'privilege_id' => $request->privilege_id
            ]
        );
    }

    public static function destroy($id)
    {
        return (User::where('id', $id)->delete() == true ? 1 : 0);
    } 
}
