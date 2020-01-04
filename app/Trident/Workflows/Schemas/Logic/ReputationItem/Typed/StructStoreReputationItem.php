<?php

namespace App\Trident\Workflows\Schemas\Logic\ReputationItem\Typed;

use App\Trident\Base\Typed\Structs\StructOptionalValues;
use J0hnys\Typed\T;

class StructstoreReputationItem extends StructOptionalValues
{
    public function __construct($data = [])
    {
        $this->types = [
            'player_id' => T::integer(),
            'name' => T::string(),
            'description' => T::nullable(T::string()),
            'reputation_cost' => T::integer(),
        ];
        
        parent::__construct($this->types);

        $this->set($data);
    }
}

