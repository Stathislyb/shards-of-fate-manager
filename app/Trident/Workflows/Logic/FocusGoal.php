<?php

namespace App\Trident\Workflows\Logic;

use App\Models\FocusGoal as FocusGoalModel;
use App\Trident\Workflows\Exceptions\FocusGoalException;
use App\Trident\Interfaces\Workflows\Repositories\FocusGoalRepositoryInterface as FocusGoalRepository;
use App\Trident\Interfaces\Workflows\Logic\FocusGoalInterface;
use App\Trident\Interfaces\Business\Logic\FocusGoalInterface as FocusGoalBusiness;
use App\Trident\Workflows\Schemas\Logic\FocusGoal\Typed\StructIndexFocusGoal;
use App\Trident\Workflows\Schemas\Logic\FocusGoal\Typed\StructStoreFocusGoal;
use App\Trident\Workflows\Schemas\Logic\FocusGoal\Typed\StructUpdateFocusGoal;
use App\Trident\Workflows\Schemas\Logic\FocusGoal\Resources\FocusGoalResource;
use App\Trident\Workflows\Schemas\Logic\FocusGoal\Resources\FocusGoalResourceCollection;

class FocusGoal implements FocusGoalInterface
{
    
    /**
     * @var \App
     */
    protected $app;

    /**
     * @var FocusGoalBusiness
     */
    protected $focusGoal_business;
    
    /**
     * @var FocusGoalRepository
     */
    protected $focusGoal_repository;

    /**
     * constructor.
     *
     * @var string
     * @return void
     */
    public function __construct(FocusGoalBusiness $focusGoal_business, FocusGoalRepository $focusGoal_repository)
    {
        $this->focusGoal_business = $focusGoal_business;
        $this->focusGoal_repository = $focusGoal_repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @param  StructIndexFocusGoal $structIndexFocusGoal
     * @return FocusGoalResourceCollection
     */
    public function index(StructIndexFocusGoal $structIndexFocusGoal): FocusGoalResourceCollection
    {
        $data = $structIndexFocusGoal->getFilledValues();
        
        $focusGoals = $this->focusGoal_repository->get();
        return new FocusGoalResourceCollection($focusGoals);
        
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
     * @param  StructStoreFocusGoal  $structStoreFocusGoal
     * @return FocusGoalResource
     */
    public function store(StructStoreFocusGoal  $structStoreFocusGoal): FocusGoalResource
    {        
        $data = $structStoreFocusGoal->getFilledValues();
        $new_focusGoal = $this->focusGoal_repository->create($data);

        return new FocusGoalResource($new_focusGoal);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return FocusGoalResource
     */
    public function show($id): FocusGoalResource
    {
        $focusGoal = $this->focusGoal_repository->findOrFail($id);
        return new FocusGoalResource($focusGoal);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return FocusGoalModel
     */
    public function edit($id): FocusGoalModel
    {
        return $this->focusGoal_repository->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StructUpdateFocusGoal  $structUpdateFocusGoal
     * @return FocusGoalResource
     */
    public function update(StructUpdateFocusGoal  $structUpdateFocusGoal): FocusGoalResource
    {   
        $id = $structUpdateFocusGoal['id'];
        $data = $structUpdateFocusGoal->getFilledValues();
        
        try {
            $this->focusGoal_repository->findOrFail($id)->update($data);
        } catch (\Exception $e) {
            throw new FocusGoalException('updateFailed');
        }

        $focusGoal = $this->focusGoal_repository->findOrFail($id);

        return new FocusGoalResource($focusGoal);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Boolean
     */
    public function destroy($id)
    {
        $deleted_count = $this->focusGoal_repository->destroy($id);
        return ($deleted_count > 0);
    }
}
