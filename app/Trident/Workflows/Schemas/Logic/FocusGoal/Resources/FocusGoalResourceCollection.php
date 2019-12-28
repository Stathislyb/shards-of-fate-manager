<?php

namespace App\Trident\Workflows\Schemas\Logic\FocusGoal\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class FocusGoalResourceCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = 'App\Trident\Workflows\Schemas\Logic\FocusGoal\Resources\FocusGoalResource';
    
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // $this->collection->each( ... )

        return parent::toArray($request);
    }

}
