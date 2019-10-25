<?php

namespace App\Trident\Workflows\Schemas\Logic\Player\Typed;

use App\Trident\Base\Typed\Structs\StructOptionalValues;
use J0hnys\Typed\T;

class StructupdatePlayer extends StructOptionalValues
{
    public function __construct($data = [])
    {
        $this->types = [
            'id' => T::integer(),
            'name' => T::string(),
            'reputation' => T::nullable(T::integer()),
            'notes' => T::nullable(T::string()),
        ];
        
        parent::__construct($this->types);

        $this->set($data);
    }
}

