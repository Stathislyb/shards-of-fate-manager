<?php

namespace App\Trident\Workflows\Logic;

use App\Models\Player as PlayerModel;
use App\Trident\Workflows\Exceptions\PlayerException;
use App\Trident\Interfaces\Workflows\Repositories\PlayerRepositoryInterface as PlayerRepository;
use App\Trident\Interfaces\Workflows\Logic\PlayerInterface;
use App\Trident\Interfaces\Business\Logic\PlayerInterface as PlayerBusiness;
use App\Trident\Workflows\Schemas\Logic\Player\Typed\StructIndexPlayer;
use App\Trident\Workflows\Schemas\Logic\Player\Typed\StructStorePlayer;
use App\Trident\Workflows\Schemas\Logic\Player\Typed\StructUpdatePlayer;
use App\Trident\Workflows\Schemas\Logic\Player\Resources\PlayerResource;
use App\Trident\Workflows\Schemas\Logic\Player\Resources\PlayerResourceCollection;

class Player implements PlayerInterface
{
    
    /**
     * @var \App
     */
    protected $app;

    /**
     * @var PlayerBusiness
     */
    protected $player_business;
    
    /**
     * @var PlayerRepository
     */
    protected $player_repository;

    /**
     * constructor.
     *
     * @var string
     * @return void
     */
    public function __construct(PlayerBusiness $player_business, PlayerRepository $player_repository)
    {
        $this->player_business = $player_business;
        $this->player_repository = $player_repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @param  StructIndexPlayer $structIndexPlayer
     * @return PlayerResourceCollection
     */
    public function index(StructIndexPlayer $structIndexPlayer): PlayerResourceCollection
    {
        $data = $structIndexPlayer->getFilledValues();
        
        $players = $this->player_repository->get();
        return new PlayerResourceCollection($players);
        
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
     * @param  StructStorePlayer  $structStorePlayer
     * @return PlayerResource
     */
    public function store(StructStorePlayer  $structStorePlayer): PlayerResource
    {        
        $data = $structStorePlayer->getFilledValues();
        $new_player = $this->player_repository->create($data);

        return new PlayerResource($new_player);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return PlayerResource
     */
    public function show($id): PlayerResource
    {
        $player = $this->player_repository->findOrFail($id);
        return new PlayerResource($player);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return PlayerModel
     */
    public function edit($id): PlayerModel
    {
        return $this->player_repository->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StructUpdatePlayer  $structUpdatePlayer
     * @return PlayerResource
     */
    public function update(StructUpdatePlayer  $structUpdatePlayer): PlayerResource
    {   
        $id = $structUpdatePlayer['id'];
        $data = $structUpdatePlayer->getFilledValues();
        $player = $this->player_repository->findOrFail($id);

        try {
            $player->update($data);
        } catch (\Exception $e) {
            throw new PlayerException('updateFailed');
        }

        return new PlayerResource($player);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Boolean
     */
    public function destroy($id)
    {
        $deleted_count = $this->player_repository->destroy($id);
        return ($deleted_count > 0);
    }
}
