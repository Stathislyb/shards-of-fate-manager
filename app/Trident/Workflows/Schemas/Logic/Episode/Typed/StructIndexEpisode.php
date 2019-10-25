<?php

namespace App\Trident\Workflows\Schemas\Logic\Episode\Typed;

use App\Trident\Base\Typed\Structs\StructOptionalValues;
use J0hnys\Typed\T;

class StructindexEpisode extends StructOptionalValues
{
    public function __construct($data = [])
    {
        $this->types = [
            'id' => T::nullable(T::integer()),
            'chapter_id' => T::nullable(T::integer()),
            'name' => T::nullable(T::string()),
            'description' => T::nullable(T::string()),
        ];
        
        parent::__construct($this->types);

        $this->set($data);
    }
}

