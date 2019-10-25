<?php 

namespace App\Trident\Workflows\Repositories;

use App\Trident\Base\Repositories\DbRepository;
use App\Trident\Interfaces\Workflows\Repositories\EpisodeRepositoryInterface;

class EpisodeRepository extends DbRepository implements EpisodeRepositoryInterface
{
    public function model()
    {
        return 'App\Models\Episode';
    }
}