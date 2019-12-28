<?php

namespace App\Trident\Workflows\Schemas\Logic\FocusGoal\Typed;

use App\Trident\Base\Typed\Structs\StructOptionalValues;
use J0hnys\Typed\T;

class StructupdateFocusGoal extends StructOptionalValues
{
    public function __construct($data = [])
    {
        $this->types = [
            'id' => T::integer(),
            'focus_id' => T::nullable(T::integer()),
            'description' => T::nullable(T::string()),
            'goal_weeks' => T::nullable(T::integer()),
            'spend_weeks' => T::nullable(T::integer()),
        ];
        
        parent::__construct($this->types);

        $this->set($data);
    }
}

