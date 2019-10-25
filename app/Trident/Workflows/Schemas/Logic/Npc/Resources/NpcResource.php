<?php

namespace App\Trident\Workflows\Schemas\Logic\Npc\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NpcResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'token' => $this->token,
            'name' => $this->name,
            'description' => $this->description,
            'public_notes' => $this->public_notes,
            'private_notes' => $this->private_notes,
        ];

        
        return parent::toArray($request);
    }

}
