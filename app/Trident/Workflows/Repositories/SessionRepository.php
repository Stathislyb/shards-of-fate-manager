<?php 

namespace App\Trident\Workflows\Repositories;

use App\Trident\Base\Repositories\DbRepository;
use App\Trident\Interfaces\Workflows\Repositories\SessionRepositoryInterface;

class SessionRepository extends DbRepository implements SessionRepositoryInterface
{
    public function model()
    {
        return 'App\Models\Session';
    }
}