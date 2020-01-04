<?php

namespace App\Trident\Workflows\Logic;

use App\Models\ReputationItem as ReputationItemModel;
use App\Trident\Workflows\Exceptions\ReputationItemException;
use App\Trident\Interfaces\Workflows\Repositories\ReputationItemRepositoryInterface as ReputationItemRepository;
use App\Trident\Interfaces\Workflows\Logic\ReputationItemInterface;
use App\Trident\Interfaces\Business\Logic\ReputationItemInterface as ReputationItemBusiness;
use App\Trident\Workflows\Schemas\Logic\ReputationItem\Typed\StructIndexReputationItem;
use App\Trident\Workflows\Schemas\Logic\ReputationItem\Typed\StructStoreReputationItem;
use App\Trident\Workflows\Schemas\Logic\ReputationItem\Typed\StructUpdateReputationItem;
use App\Trident\Workflows\Schemas\Logic\ReputationItem\Resources\ReputationItemResource;
use App\Trident\Workflows\Schemas\Logic\ReputationItem\Resources\ReputationItemResourceCollection;

class ReputationItem implements ReputationItemInterface
{
    
    /**
     * @var \App
     */
    protected $app;

    /**
     * @var ReputationItemBusiness
     */
    protected $reputationItem_business;
    
    /**
     * @var ReputationItemRepository
     */
    protected $reputationItem_repository;

    /**
     * constructor.
     *
     * @var string
     * @return void
     */
    public function __construct(ReputationItemBusiness $reputationItem_business, ReputationItemRepository $reputationItem_repository)
    {
        $this->reputationItem_business = $reputationItem_business;
        $this->reputationItem_repository = $reputationItem_repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @param  StructIndexReputationItem $structIndexReputationItem
     * @return ReputationItemResourceCollection
     */
    public function index(StructIndexReputationItem $structIndexReputationItem): ReputationItemResourceCollection
    {
        $data = $structIndexReputationItem->getFilledValues();
        
        $reputationItems = $this->reputationItem_repository->get();
        return new ReputationItemResourceCollection($reputationItems);
        
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
     * @param  StructStoreReputationItem  $structStoreReputationItem
     * @return ReputationItemResource
     */
    public function store(StructStoreReputationItem  $structStoreReputationItem): ReputationItemResource
    {        
        $data = $structStoreReputationItem->getFilledValues();
        $new_reputationItem = $this->reputationItem_repository->create($data);

        return new ReputationItemResource($new_reputationItem);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return ReputationItemResource
     */
    public function show($id): ReputationItemResource
    {
        $reputationItem = $this->reputationItem_repository->findOrFail($id);
        return new ReputationItemResource($reputationItem);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return ReputationItemModel
     */
    public function edit($id): ReputationItemModel
    {
        return $this->reputationItem_repository->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StructUpdateReputationItem  $structUpdateReputationItem
     * @return ReputationItemResource
     */
    public function update(StructUpdateReputationItem  $structUpdateReputationItem): ReputationItemResource
    {   
        $id = $structUpdateReputationItem['id'];
        $data = $structUpdateReputationItem->getFilledValues();
        $reputationItem = $this->reputationItem_repository->findOrFail($id);

        try {
            $reputationItem->update($data);
        } catch (\Exception $e) {
            throw new ReputationItemException('updateFailed');
        }

        return new ReputationItemResource($reputationItem);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Boolean
     */
    public function destroy($id)
    {
        $deleted_count = $this->reputationItem_repository->destroy($id);
        return ($deleted_count > 0);
    }
}
