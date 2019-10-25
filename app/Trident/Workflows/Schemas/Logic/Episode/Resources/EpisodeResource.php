<?php

namespace App\Trident\Workflows\Schemas\Logic\Episode\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EpisodeResource extends JsonResource
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
            'chapter_id' => $this->chapter_id,
            'name' => $this->name,
            'description' => $this->description,
        ];

        
        return parent::toArray($request);
    }

}
