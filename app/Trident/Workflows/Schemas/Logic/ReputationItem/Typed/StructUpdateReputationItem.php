<?php

namespace App\Trident\Workflows\Schemas\Logic\ReputationItem\Typed;

use App\Trident\Base\Typed\Structs\StructOptionalValues;
use J0hnys\Typed\T;

class StructupdateReputationItem extends StructOptionalValues
{
    public function __construct($data = [])
    {
        $this->types = [
            'id' => T::integer(),
            'player_id' => T::nullable(T::integer()),
            'name' => T::nullable(T::string()),
            'description' => T::nullable(T::string()),
            'reputation_cost' => T::nullable(T::integer()),
        ];
        
        parent::__construct($this->types);

        $this->set($data);
    }
}

