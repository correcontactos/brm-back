<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Privilege;

class PrivilegeController extends BaseController
{
    public static function index()
    {
        return Privilege::all();
    }

    public static function show($id)
    {
        return Privilege::findOrFail($id);
    }

    public static function store($request)
    {
        return PrivilegeController::show(
            Privilege::insertGetId
            (
                [
                    'name' => $request->name,
                    'access' => $request->access
                ]
            )
        );
    }

    public static function edit($request)
    {
        return Privilege::where('id', $request->id)
            ->update(
            [
                'name' => $request->name,
                'access' => $request->access
            ]
        );
    }

    public static function destroy($id)
    {
        return (Privilege::where('id', $id)
            ->delete() == true ? 1 : 0);
    } 
}
