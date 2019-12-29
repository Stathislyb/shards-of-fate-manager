<?php

namespace App\Http\Controllers\Trident;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Container\Container as App;
use App\Trident\Interfaces\Workflows\Logic\FocusGoalInterface as FocusGoalWorkflow;
use App\Trident\Interfaces\Workflows\Repositories\FocusGoalRepositoryInterface as FocusGoalRepository;
use App\Trident\Workflows\Exceptions\FocusGoalException;
use App\Trident\Workflows\Validations\FocusGoalStoreRequest;
use App\Trident\Workflows\Validations\FocusGoalUpdateRequest;
use App\Trident\Workflows\Schemas\Logic\FocusGoal\Typed\StructIndexFocusGoal;
use App\Trident\Workflows\Schemas\Logic\FocusGoal\Typed\StructStoreFocusGoal;
use App\Trident\Workflows\Schemas\Logic\FocusGoal\Typed\StructUpdateFocusGoal;

class FocusGoalController extends Controller
{
    /**
     * @var FocusGoal
     */
    protected $focusGoal;

    public function __construct(FocusGoalWorkflow $focusGoal_workflow, FocusGoalRepository $focus_goal_repository)
    {
        $this->focusGoal_workflow = $focusGoal_workflow;
        $this->focus_goal_repository = $focus_goal_repository;
    }


    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    // RESTFUL CRUD START
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('list',FocusGoalRepository::class);
        return $this->focus_goal_repository->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FocusGoalStoreRequest $request)
    {
        $this->authorize('create',$this->focus_goal_repository);
        $structStoreFocusGoal = new StructStoreFocusGoal( $request->all() );
        $focusGoalResource = $this->focusGoal_workflow->store($structStoreFocusGoal);
        return response()->json( $focusGoalResource );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', [$this->focus_goal_repository, $id]);
        return response()->json( $this->focus_goal_repository->find($id) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FocusGoalUpdateRequest $request, $id)
    {   
        $this->authorize('update', [$this->focus_goal_repository, $id]);
        $structUpdateFocusGoal = new StructUpdateFocusGoal($request->all());        
        $focusGoalResource = $this->focusGoal_workflow->update($structUpdateFocusGoal);
        return response()->json( $focusGoalResource );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', [$this->focus_goal_repository, $id]);
        return response()->json( $this->focus_goal_repository->destroy($id) );
    }

    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    // RESTFUL CRUD END
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=



    
}
