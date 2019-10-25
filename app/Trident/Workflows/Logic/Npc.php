<?php

namespace App\Trident\Workflows\Logic;

use App\Models\Npc as NpcModel;
use App\Trident\Workflows\Exceptions\NpcException;
use App\Trident\Interfaces\Workflows\Repositories\NpcRepositoryInterface as NpcRepository;
use App\Trident\Interfaces\Workflows\Logic\NpcInterface;
use App\Trident\Interfaces\Business\Logic\NpcInterface as NpcBusiness;
use App\Trident\Workflows\Schemas\Logic\Npc\Typed\StructIndexNpc;
use App\Trident\Workflows\Schemas\Logic\Npc\Typed\StructStoreNpc;
use App\Trident\Workflows\Schemas\Logic\Npc\Typed\StructUpdateNpc;
use App\Trident\Workflows\Schemas\Logic\Npc\Resources\NpcResource;
use App\Trident\Workflows\Schemas\Logic\Npc\Resources\NpcResourceCollection;

class Npc implements NpcInterface
{
    
    /**
     * @var \App
     */
    protected $app;

    /**
     * @var NpcBusiness
     */
    protected $npc_business;
    
    /**
     * @var NpcRepository
     */
    protected $npc_repository;

    /**
     * constructor.
     *
     * @var string
     * @return void
     */
    public function __construct(NpcBusiness $npc_business, NpcRepository $npc_repository)
    {
        $this->npc_business = $npc_business;
        $this->npc_repository = $npc_repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @param  StructIndexNpc $structIndexNpc
     * @return NpcResourceCollection
     */
    public function index(StructIndexNpc $structIndexNpc): NpcResourceCollection
    {
        $data = $structIndexNpc->getFilledValues();
        
        $npcs = $this->npc_repository->get();
        return new NpcResourceCollection($npcs);
        
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
     * @param  StructStoreNpc  $structStoreNpc
     * @return NpcResource
     */
    public function store(StructStoreNpc  $structStoreNpc): NpcResource
    {        
        $data = $structStoreNpc->getFilledValues();
        $new_npc = $this->npc_repository->create($data);

        return new NpcResource($new_npc);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return NpcResource
     */
    public function show($id): NpcResource
    {
        $npc = $this->npc_repository->findOrFail($id);
        return new NpcResource($npc);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return NpcModel
     */
    public function edit($id): NpcModel
    {
        return $this->npc_repository->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StructUpdateNpc  $structUpdateNpc
     * @return NpcResource
     */
    public function update(StructUpdateNpc  $structUpdateNpc): NpcResource
    {   
        $id = $structUpdateNpc['id'];
        $data = $structUpdateNpc->getFilledValues();
        $npc = $this->npc_repository->findOrFail($id);

        try {
            $npc->update($data);
        } catch (\Exception $e) {
            throw new NpcException('updateFailed');
        }

        return new NpcResource($npc);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Boolean
     */
    public function destroy($id)
    {
        $deleted_count = $this->npc_repository->destroy($id);
        return ($deleted_count > 0);
    }
}
