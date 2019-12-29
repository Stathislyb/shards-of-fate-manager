<?php

namespace App\Trident\Workflows\Schemas\Logic\FocusGoal\Typed;

use App\Trident\Base\Typed\Structs\StructOptionalValues;
use J0hnys\Typed\T;

class StructstoreFocusGoal extends StructOptionalValues
{
    public function __construct($data = [])
    {
        $this->types = [
            'focus_id' => T::integer(),
            'name' => T::string(),
            'description' => T::nullable(T::string()),
            'goal_weeks' => T::integer(),
        ];
        
        parent::__construct($this->types);

        $this->set($data);
    }
}

