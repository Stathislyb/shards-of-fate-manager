<?php

namespace App\Http\Controllers\Trident;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Trident\Interfaces\Workflows\Logic\NpcInterface as NpcWorkflow;
use App\Trident\Interfaces\Workflows\Repositories\NpcRepositoryInterface as NpcRepository;
use App\Trident\Workflows\Validations\NpcStoreRequest;
use App\Trident\Workflows\Validations\NpcUpdateRequest;
use App\Trident\Workflows\Schemas\Logic\Npc\Typed\StructIndexNpc;
use App\Trident\Workflows\Schemas\Logic\Npc\Typed\StructStoreNpc;
use App\Trident\Workflows\Schemas\Logic\Npc\Typed\StructUpdateNpc;

class NpcController extends Controller
{
    
    /**
     * @var NpcWorkflow
     */
    protected $npc_workflow;
    
    /**
     * @var NpcRepository
     */
    protected $npc_repository;

    public function __construct(NpcWorkflow $npc_workflow, NpcRepository $npc_repository)
    {
        $this->npc_workflow = $npc_workflow;
        $this->npc_repository = $npc_repository;
    }


    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    // RESTFUL CRUD START
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

    /**
     * Display a listing of the resource.
     *
     * @param Request  $request
     * @return NpcRepository
     */
    public function index(Request $request)
    {
        $this->authorize('list',$this->npc_repository);
        $structIndexNpc = new StructIndexNpc( $request->all() );
        $npcResourceCollection = $this->npc_workflow->index($structIndexNpc);
        return response()->json( $npcResourceCollection );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {   
        $this->authorize('create',$this->npc_repository);
        return view('npc_create');  //ayto DEN tha to exw sto restful_crud code generation
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NpcStoreRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(NpcStoreRequest $request)
    {
        $this->authorize('create',$this->npc_repository);
        $structStoreNpc = new StructStoreNpc( $request->all() );
        $npcResource = $this->npc_workflow->store($structStoreNpc);
        return response()->json( $npcResource );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $this->authorize('view', [$this->npc_repository, $id]);
        return response()->json( $this->npc_workflow->show($id) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $this->authorize('update', [$this->npc_repository, $id]);
        $npc = $this->npc_workflow->edit($id);
        return view('npc_edit', compact('npc'));    //ayto DEN tha to exw sto restful_crud code generation
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  NpcUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(NpcUpdateRequest $request, $id)
    {   
        $this->authorize('update', [$this->npc_repository, $id]);
        $structUpdateNpc = new StructUpdateNpc($request->all());        
        $npcResource = $this->npc_workflow->update($structUpdateNpc);
        return response()->json( $npcResource );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->authorize('delete', [$this->npc_repository, $id]);
        return response()->json( $this->npc_workflow->destroy($id) );
    }

    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    // RESTFUL CRUD END
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=



    
}
