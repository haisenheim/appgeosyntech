<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ProjetResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // dd($this); 
        return ['name'=>$this->name];
    }
}
