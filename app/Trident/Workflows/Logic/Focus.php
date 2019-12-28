<?php

namespace App\Trident\Workflows\Logic;

use App\Models\Focus as FocusModel;
use App\Trident\Workflows\Exceptions\FocusException;
use App\Trident\Interfaces\Workflows\Repositories\FocusRepositoryInterface as FocusRepository;
use App\Trident\Interfaces\Workflows\Logic\FocusInterface;
use App\Trident\Interfaces\Business\Logic\FocusInterface as FocusBusiness;
use App\Trident\Workflows\Schemas\Logic\Focus\Typed\StructIndexFocus;
use App\Trident\Workflows\Schemas\Logic\Focus\Typed\StructStoreFocus;
use App\Trident\Workflows\Schemas\Logic\Focus\Typed\StructUpdateFocus;
use App\Trident\Workflows\Schemas\Logic\Focus\Resources\FocusResource;
use App\Trident\Workflows\Schemas\Logic\Focus\Resources\FocusResourceCollection;

class Focus implements FocusInterface
{
    
    /**
     * @var \App
     */
    protected $app;

    /**
     * @var FocusBusiness
     */
    protected $focus_business;
    
    /**
     * @var FocusRepository
     */
    protected $focus_repository;

    /**
     * constructor.
     *
     * @var string
     * @return void
     */
    public function __construct(FocusBusiness $focus_business, FocusRepository $focus_repository)
    {
        $this->focus_business = $focus_business;
        $this->focus_repository = $focus_repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @param  StructIndexFocus $structIndexFocus
     * @return FocusResourceCollection
     */
    public function index(StructIndexFocus $structIndexFocus): FocusResourceCollection
    {
        $data = $structIndexFocus->getFilledValues();
        
        $focus = $this->focus_repository->with(['focusGoals'])->get();
        return new FocusResourceCollection($focus);
        
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
     * @param  StructStoreFocus  $structStoreFocus
     * @return FocusResource
     */
    public function store(StructStoreFocus  $structStoreFocus): FocusResource
    {        
        $data = $structStoreFocus->getFilledValues();
        $new_focus = $this->focus_repository->create($data);

        return new FocusResource($new_focus);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return FocusResource
     */
    public function show($id): FocusResource
    {
        $focus = $this->focus_repository->findOrFail($id);
        return new FocusResource($focus);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return FocusModel
     */
    public function edit($id): FocusModel
    {
        return $this->focus_repository->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StructUpdateFocus  $structUpdateFocus
     * @return FocusResource
     */
    public function update(StructUpdateFocus  $structUpdateFocus): FocusResource
    {   
        $id = $structUpdateFocus['id'];
        $data = $structUpdateFocus->getFilledValues();
        $focus = $this->focus_repository->findOrFail($id);

        try {
            $focus->update($data);
        } catch (\Exception $e) {
            throw new FocusException('updateFailed');
        }

        return new FocusResource($focus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Boolean
     */
    public function destroy($id)
    {
        $deleted_count = $this->focus_repository->destroy($id);
        return ($deleted_count > 0);
    }
}
