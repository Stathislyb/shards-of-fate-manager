<?php 

namespace App\Trident\Workflows\Repositories;

use App\Trident\Base\Repositories\DbRepository;
use App\Trident\Interfaces\Workflows\Repositories\PlayerRepositoryInterface;

class PlayerRepository extends DbRepository implements PlayerRepositoryInterface
{
    public function model()
    {
        return 'App\Models\Player';
    }
}