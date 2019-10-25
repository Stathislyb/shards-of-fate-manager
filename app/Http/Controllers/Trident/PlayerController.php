<?php

namespace App\Http\Controllers\Trident;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Trident\Interfaces\Workflows\Logic\PlayerInterface as PlayerWorkflow;
use App\Trident\Interfaces\Workflows\Repositories\PlayerRepositoryInterface as PlayerRepository;
use App\Trident\Workflows\Validations\PlayerStoreRequest;
use App\Trident\Workflows\Validations\PlayerUpdateRequest;
use App\Trident\Workflows\Schemas\Logic\Player\Typed\StructIndexPlayer;
use App\Trident\Workflows\Schemas\Logic\Player\Typed\StructStorePlayer;
use App\Trident\Workflows\Schemas\Logic\Player\Typed\StructUpdatePlayer;

class PlayerController extends Controller
{
    
    /**
     * @var PlayerWorkflow
     */
    protected $player_workflow;
    
    /**
     * @var PlayerRepository
     */
    protected $player_repository;

    public function __construct(PlayerWorkflow $player_workflow, PlayerRepository $player_repository)
    {
        $this->player_workflow = $player_workflow;
        $this->player_repository = $player_repository;
    }


    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    // RESTFUL CRUD START
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

    /**
     * Display a listing of the resource.
     *
     * @param Request  $request
     * @return PlayerRepository
     */
    public function index(Request $request)
    {
        $this->authorize('list',$this->player_repository);
        $structIndexPlayer = new StructIndexPlayer( $request->all() );
        $playerResourceCollection = $this->player_workflow->index($structIndexPlayer);
        return response()->json( $playerResourceCollection );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {   
        $this->authorize('create',$this->player_repository);
        return view('player_create');  //ayto DEN tha to exw sto restful_crud code generation
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PlayerStoreRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(PlayerStoreRequest $request)
    {
        $this->authorize('create',$this->player_repository);
        $structStorePlayer = new StructStorePlayer( $request->all() );
        $playerResource = $this->player_workflow->store($structStorePlayer);
        return response()->json( $playerResource );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $this->authorize('view', [$this->player_repository, $id]);
        return response()->json( $this->player_workflow->show($id) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $this->authorize('update', [$this->player_repository, $id]);
        $player = $this->player_workflow->edit($id);
        return view('player_edit', compact('player'));    //ayto DEN tha to exw sto restful_crud code generation
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PlayerUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(PlayerUpdateRequest $request, $id)
    {   
        $this->authorize('update', [$this->player_repository, $id]);
        $structUpdatePlayer = new StructUpdatePlayer($request->all());        
        $playerResource = $this->player_workflow->update($structUpdatePlayer);
        return response()->json( $playerResource );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->authorize('delete', [$this->player_repository, $id]);
        return response()->json( $this->player_workflow->destroy($id) );
    }

    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    // RESTFUL CRUD END
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=



    
}
