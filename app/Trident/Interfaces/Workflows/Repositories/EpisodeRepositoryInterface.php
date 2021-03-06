<?php

namespace App\Trident\Interfaces\Workflows\Repositories;

interface EpisodeRepositoryInterface
{
    public function all();
    
    public function save();

    public function show($id);

    public function paginate(int $perPage, array $columns);
    
    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function findBy($attribute, $value, array $columns);

    public function with(array $relations);

    public function where(string $column_name, $relations);
}
