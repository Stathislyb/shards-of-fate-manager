<?php 

namespace App\Trident\Workflows\Repositories;

use App\Trident\Base\Repositories\DbRepository;
use App\Trident\Interfaces\Workflows\Repositories\ReputationItemRepositoryInterface;

class ReputationItemRepository extends DbRepository implements ReputationItemRepositoryInterface
{
    public function model()
    {
        return 'App\Models\ReputationItem';
    }
}