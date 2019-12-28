<?php

namespace App\Trident\Workflows\Schemas\Logic\Focus\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FocusResource extends JsonResource
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
