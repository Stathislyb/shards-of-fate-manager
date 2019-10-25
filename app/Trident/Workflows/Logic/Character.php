<?php

namespace App\Trident\Workflows\Logic;

use App\Models\Character as CharacterModel;
use App\Trident\Workflows\Exceptions\CharacterException;
use App\Trident\Interfaces\Workflows\Repositories\CharacterRepositoryInterface as CharacterRepository;
use App\Trident\Interfaces\Workflows\Logic\CharacterInterface;
use App\Trident\Interfaces\Business\Logic\CharacterInterface as CharacterBusiness;
use App\Trident\Workflows\Schemas\Logic\Character\Typed\StructIndexCharacter;
use App\Trident\Workflows\Schemas\Logic\Character\Typed\StructStoreCharacter;
use App\Trident\Workflows\Schemas\Logic\Character\Typed\StructUpdateCharacter;
use App\Trident\Workflows\Schemas\Logic\Character\Resources\CharacterResource;
use App\Trident\Workflows\Schemas\Logic\Character\Resources\CharacterResourceCollection;

class Character implements CharacterInterface
{
    
    /**
     * @var \App
     */
    protected $app;

    /**
     * @var CharacterBusiness
     */
    protected $character_business;
    
    /**
     * @var CharacterRepository
     */
    protected $character_repository;

    /**
     * constructor.
     *
     * @var string
     * @return void
     */
    public function __construct(CharacterBusiness $character_business, CharacterRepository $character_repository)
    {
        $this->character_business = $character_business;
        $this->character_repository = $character_repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @param  StructIndexCharacter $structIndexCharacter
     * @return CharacterResourceCollection
     */
    public function index(StructIndexCharacter $structIndexCharacter): CharacterResourceCollection
    {
        $data = $structIndexCharacter->getFilledValues();
        
        $characters = $this->character_repository->get();
        return new CharacterResourceCollection($characters);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        //
        // TO DO
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StructStoreCharacter  $structStoreCharacter
     * @return CharacterResource
     */
    public function store(StructStoreCharacter  $structStoreCharacter): CharacterResource
    {        
        $data = $structStoreCharacter->getFilledValues();
        $new_character = $this->character_repository->create($data);

        return new CharacterResource($new_character);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return CharacterResource
     */
    public function show($id): CharacterResource
    {
        $character = $this->character_repository->findOrFail($id);
        return new CharacterResource($character);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return CharacterModel
     */
    public function edit($id): CharacterModel
    {
        return $this->character_repository->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StructUpdateCharacter  $structUpdateCharacter
     * @return CharacterResource
     */
    public function update(StructUpdateCharacter  $structUpdateCharacter): CharacterResource
    {   
        $id = $structUpdateCharacter['id'];
        $data = $structUpdateCharacter->getFilledValues();
        $character = $this->character_repository->findOrFail($id);

        try {
            $character->update($data);
        } catch (\Exception $e) {
            throw new CharacterException('updateFailed');
        }

        return new CharacterResource($character);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Boolean
     */
    public function destroy($id)
    {
        $deleted_count = $this->character_repository->destroy($id);
        return ($deleted_count > 0);
    }
}
