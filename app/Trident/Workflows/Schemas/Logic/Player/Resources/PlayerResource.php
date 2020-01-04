<?php

namespace App\Trident\Workflows\Schemas\Logic\Player\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlayerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return [
        //     'id' => $this->id,
        //     'token' => $this->token,
        //     'name' => $this->name,
        //     'reputation' => $this->reputation,
        //     'notes' => $this->notes,
        //     'created_at' => $this->created_at,
        //     'updated_at' => $this->updated_at,
        // ];

        
        return parent::toArray($request);
    }

}
