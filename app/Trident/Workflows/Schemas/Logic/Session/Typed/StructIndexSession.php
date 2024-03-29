<?php

namespace App\Trident\Workflows\Schemas\Logic\Session\Typed;

use App\Trident\Base\Typed\Structs\StructOptionalValues;
use J0hnys\Typed\T;

class StructindexSession extends StructOptionalValues
{
    public function __construct($data = [])
    {
        $this->types = [
            'id' => T::nullable(T::integer()),
            'episode_id' => T::nullable(T::integer()),
            'user_id' => T::nullable(T::integer()),
            'hook' => T::nullable(T::string()),
            'public_description' => T::nullable(T::string()),
            'private_description' => T::nullable(T::string()),
            'starts_at' => T::nullable(T::string()),
        ];
        
        parent::__construct($this->types);

        $this->set($data);
    }
}

