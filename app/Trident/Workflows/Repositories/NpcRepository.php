<?php 

namespace App\Trident\Workflows\Repositories;

use App\Trident\Base\Repositories\DbRepository;
use App\Trident\Interfaces\Workflows\Repositories\NpcRepositoryInterface;

class NpcRepository extends DbRepository implements NpcRepositoryInterface
{
    public function model()
    {
        return 'App\Models\Npc';
    }
}