<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
//use App\Http\Resources\PrivilegeResource;
use App\Models\Privilege;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'user' => $this->user,
            'privilege' => (Privilege::select('name')->where('id', $this->privilege_id)->first() == null ? null : Privilege::select('name')->where('id', $this->privilege_id)->first()['name']),
            'access' => (Privilege::select('access')->where('id', $this->privilege_id)->first() == null ? null : Privilege::select('access')->where('id', $this->privilege_id)->first()['access'])    
        ];
    }

    public static function single($request)
    {
        return [
            'id' => $request->id,
            'user' => $request->user,
            'privilege_id' => $request->privilege_id, 
            'privilege' => (Privilege::select('name')->where('id', $request->privilege_id)->first() == null ? null : Privilege::select('name')->where('id', $request->privilege_id)->first()['name']),
            'access' => (Privilege::select('access')->where('id', $request->privilege_id)->first() == null ? null : Privilege::select('access')->where('id', $request->privilege_id)->first()['access'])   
        ];
    }

    public static function edit($request)
    {
        return [
            'affected' => $request
        ];
    }

    public static function destroy($id)
    {
        return [
            'affected' => $id
        ];
    }
}
