<?php

namespace App\Trident\Workflows\Schemas\Logic\Character\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CharacterResource extends JsonResource
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
            'player_id' => $this->player_id,
            'name' => $this->name,
            'race' => $this->race,
            'class' => $this->class,
            'level' => $this->level,
            'unique_thing' => $this->unique_thing,
            'focus' => $this->focus,
            'start_date' => $this->start_date,
            'death_date' => $this->death_date,
            'notes' => $this->notes,
        ];

        
        return parent::toArray($request);
    }

}
