<?php

namespace App\Trident\Workflows\Schemas\Logic\Session\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SessionResource extends JsonResource
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
            'episode_id' => $this->episode_id,
            'user_id' => $this->user_id,
            'hook' => $this->hook,
            'public_description' => $this->public_description,
            'private_description' => $this->private_description,
            'starts_at' => $this->starts_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];

        
        return parent::toArray($request);
    }

}
