<?php 

namespace App\Trident\Workflows\Repositories;

use App\Trident\Base\Repositories\DbRepository;
use App\Trident\Interfaces\Workflows\Repositories\ChapterRepositoryInterface;

class ChapterRepository extends DbRepository implements ChapterRepositoryInterface
{
    public function model()
    {
        return 'App\Models\Chapter';
    }
}