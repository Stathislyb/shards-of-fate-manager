<?php

namespace App\Trident\Workflows\Schemas\Logic\Character\Typed;

use App\Trident\Base\Typed\Structs\StructOptionalValues;
use J0hnys\Typed\T;

class StructindexCharacter extends StructOptionalValues
{
    public function __construct($data = [])
    {
        $this->types = [
            'id' => T::nullable(T::integer()),
            'player_id' => T::nullable(T::integer()),
            'name' => T::nullable(T::string()),
            'race' => T::nullable(T::string()),
            'class' => T::nullable(T::string()),
            'level' => T::nullable(T::string()),
            'unique_thing' => T::nullable(T::string()),
            'focus' => T::nullable(T::string()),
            'start_date' => T::nullable(T::string()),
            'death_date' => T::nullable(T::string()),
            'notes' => T::nullable(T::string()),
        ];
        
        parent::__construct($this->types);

        $this->set($data);
    }
}

