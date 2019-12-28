<?php 

namespace App\Trident\Workflows\Repositories;

use App\Trident\Base\Repositories\DbRepository;
use App\Trident\Interfaces\Workflows\Repositories\FocusGoalRepositoryInterface;

class FocusGoalRepository extends DbRepository implements FocusGoalRepositoryInterface
{
    public function model()
    {
        return 'App\Models\FocusGoal';
    }
}