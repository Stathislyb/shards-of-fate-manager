<?php

namespace App\Trident\Workflows\Schemas\Logic\Focus\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class FocusResourceCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = 'App\Trident\Workflows\Schemas\Logic\Focus\Resources\FocusResource';
    
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
