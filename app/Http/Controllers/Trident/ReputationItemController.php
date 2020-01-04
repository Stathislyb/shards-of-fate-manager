<?php

namespace App\Http\Controllers\Trident;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Trident\Interfaces\Workflows\Logic\ReputationItemInterface as ReputationItemWorkflow;
use App\Trident\Interfaces\Workflows\Repositories\ReputationItemRepositoryInterface as ReputationItemRepository;
use App\Trident\Workflows\Validations\ReputationItemStoreRequest;
use App\Trident\Workflows\Validations\ReputationItemUpdateRequest;
use App\Trident\Workflows\Schemas\Logic\ReputationItem\Typed\StructIndexReputationItem;
use App\Trident\Workflows\Schemas\Logic\ReputationItem\Typed\StructStoreReputationItem;
use App\Trident\Workflows\Schemas\Logic\ReputationItem\Typed\StructUpdateReputationItem;

class ReputationItemController extends Controller
{
    
    /**
     * @var ReputationItemWorkflow
     */
    protected $reputationItem_workflow;
    
    /**
     * @var ReputationItemRepository
     */
    protected $reputationItem_repository;

    public function __construct(ReputationItemWorkflow $reputationItem_workflow, ReputationItemRepository $reputationItem_repository)
    {
        $this->reputationItem_workflow = $reputationItem_workflow;
        $this->reputationItem_repository = $reputationItem_repository;
    }


    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    // RESTFUL CRUD START
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

    /**
     * Display a listing of the resource.
     *
     * @param Request  $request
     * @return ReputationItemRepository
     */
    public function index(Request $request)
    {
        $this->authorize('list',$this->reputationItem_repository);
        $structIndexReputationItem = new StructIndexReputationItem( $request->all() );
        $reputationItemResourceCollection = $this->reputationItem_workflow->index($structIndexReputationItem);
        return response()->json( $reputationItemResourceCollection );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {   
        $this->authorize('create',$this->reputationItem_repository);
        return view('reputationItem_create');  //ayto DEN tha to exw sto restful_crud code generation
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ReputationItemStoreRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ReputationItemStoreRequest $request)
    {
        $this->authorize('create',$this->reputationItem_repository);
        $structStoreReputationItem = new StructStoreReputationItem( $request->all() );
        $reputationItemResource = $this->reputationItem_workflow->store($structStoreReputationItem);
        return response()->json( $reputationItemResource );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $this->authorize('view', [$this->reputationItem_repository, $id]);
        return response()->json( $this->reputationItem_workflow->show($id) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $this->authorize('update', [$this->reputationItem_repository, $id]);
        $reputationItem = $this->reputationItem_workflow->edit($id);
        return view('reputationItem_edit', compact('reputationItem'));    //ayto DEN tha to exw sto restful_crud code generation
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ReputationItemUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ReputationItemUpdateRequest $request, $id)
    {   
        $this->authorize('update', [$this->reputationItem_repository, $id]);
        $structUpdateReputationItem = new StructUpdateReputationItem($request->all());        
        $reputationItemResource = $this->reputationItem_workflow->update($structUpdateReputationItem);
        return response()->json( $reputationItemResource );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->authorize('delete', [$this->reputationItem_repository, $id]);
        return response()->json( $this->reputationItem_workflow->destroy($id) );
    }

    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    // RESTFUL CRUD END
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=



    
}
