<?php 

namespace App\Trident\Workflows\Repositories;

use App\Trident\Base\Repositories\DbRepository;
use App\Trident\Interfaces\Workflows\Repositories\FocusRepositoryInterface;

class FocusRepository extends DbRepository implements FocusRepositoryInterface
{
    public function model()
    {
        return 'App\Models\Focus';
    }
}