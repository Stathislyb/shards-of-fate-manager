<?php

namespace App\Trident\Workflows\Schemas\Logic\FocusGoal\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FocusGoalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        
        return parent::toArray($request);
    }

}
