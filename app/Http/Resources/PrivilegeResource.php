<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PrivilegeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    public static function single($request)
    {
        return [
            'id' => $request->id,
            'name' => $request->name,
            'access' => $request->access     
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
