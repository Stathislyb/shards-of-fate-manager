<?php

namespace App\Trident\Workflows\Schemas\Logic\Episode\Typed;

use App\Trident\Base\Typed\Structs\StructOptionalValues;
use J0hnys\Typed\T;

class StructstoreEpisode extends StructOptionalValues
{
    public function __construct($data = [])
    {
        $this->types = [
            'chapter_id' => T::integer(),
            'name' => T::string(),
            'description' => T::nullable(T::string()),
        ];
        
        parent::__construct($this->types);

        $this->set($data);
    }
}

