<?php

namespace App\Trident\Workflows\Schemas\Logic\Chapter\Typed;

use App\Trident\Base\Typed\Structs\StructOptionalValues;
use J0hnys\Typed\T;

class StructstoreChapter extends StructOptionalValues
{
    public function __construct($data = [])
    {
        $this->types = [
            'name' => T::string(),
            'description' => T::nullable(T::string()),
        ];
        
        parent::__construct($this->types);

        $this->set($data);
    }
}

