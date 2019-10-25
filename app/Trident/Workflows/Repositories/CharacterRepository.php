<?php 

namespace App\Trident\Workflows\Repositories;

use App\Trident\Base\Repositories\DbRepository;
use App\Trident\Interfaces\Workflows\Repositories\CharacterRepositoryInterface;

class CharacterRepository extends DbRepository implements CharacterRepositoryInterface
{
    public function model()
    {
        return 'App\Models\Character';
    }
}