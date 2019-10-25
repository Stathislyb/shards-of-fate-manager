<?php

namespace App\Http\Controllers\Trident;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Trident\Interfaces\Workflows\Logic\CharacterInterface as CharacterWorkflow;
use App\Trident\Interfaces\Workflows\Repositories\CharacterRepositoryInterface as CharacterRepository;
use App\Trident\Workflows\Validations\CharacterStoreRequest;
use App\Trident\Workflows\Validations\CharacterUpdateRequest;
use App\Trident\Workflows\Schemas\Logic\Character\Typed\StructIndexCharacter;
use App\Trident\Workflows\Schemas\Logic\Character\Typed\StructStoreCharacter;
use App\Trident\Workflows\Schemas\Logic\Character\Typed\StructUpdateCharacter;

class CharacterController extends Controller
{
    
    /**
     * @var CharacterWorkflow
     */
    protected $character_workflow;
    
    /**
     * @var CharacterRepository
     */
    protected $character_repository;

    public function __construct(CharacterWorkflow $character_workflow, CharacterRepository $character_repository)
    {
        $this->character_workflow = $character_workflow;
        $this->character_repository = $character_repository;
    }


    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    // RESTFUL CRUD START
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

    /**
     * Display a listing of the resource.
     *
     * @param Request  $request
     * @return CharacterRepository
     */
    public function index(Request $request)
    {
        $this->authorize('list',$this->character_repository);
        $structIndexCharacter = new StructIndexCharacter( $request->all() );
        $characterResourceCollection = $this->character_workflow->index($structIndexCharacter);
        return response()->json( $characterResourceCollection );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {   
        $this->authorize('create',$this->character_repository);
        return view('character_create');  //ayto DEN tha to exw sto restful_crud code generation
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CharacterStoreRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CharacterStoreRequest $request)
    {
        $this->authorize('create',$this->character_repository);
        $structStoreCharacter = new StructStoreCharacter( $request->all() );
        $characterResource = $this->character_workflow->store($structStoreCharacter);
        return response()->json( $characterResource );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $this->authorize('view', [$this->character_repository, $id]);
        return response()->json( $this->character_workflow->show($id) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $this->authorize('update', [$this->character_repository, $id]);
        $character = $this->character_workflow->edit($id);
        return view('character_edit', compact('character'));    //ayto DEN tha to exw sto restful_crud code generation
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CharacterUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CharacterUpdateRequest $request, $id)
    {   
        $this->authorize('update', [$this->character_repository, $id]);
        $structUpdateCharacter = new StructUpdateCharacter($request->all());        
        $characterResource = $this->character_workflow->update($structUpdateCharacter);
        return response()->json( $characterResource );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->authorize('delete', [$this->character_repository, $id]);
        return response()->json( $this->character_workflow->destroy($id) );
    }

    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    // RESTFUL CRUD END
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=



    
}
