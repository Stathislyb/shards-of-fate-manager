<?php

namespace App\Http\Controllers\Trident;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Trident\Interfaces\Workflows\Logic\SessionInterface as SessionWorkflow;
use App\Trident\Interfaces\Workflows\Repositories\SessionRepositoryInterface as SessionRepository;
use App\Trident\Workflows\Validations\SessionStoreRequest;
use App\Trident\Workflows\Validations\SessionUpdateRequest;
use App\Trident\Workflows\Schemas\Logic\Session\Typed\StructIndexSession;
use App\Trident\Workflows\Schemas\Logic\Session\Typed\StructStoreSession;
use App\Trident\Workflows\Schemas\Logic\Session\Typed\StructUpdateSession;

class SessionController extends Controller
{
    
    /**
     * @var SessionWorkflow
     */
    protected $session_workflow;
    
    /**
     * @var SessionRepository
     */
    protected $session_repository;

    public function __construct(SessionWorkflow $session_workflow, SessionRepository $session_repository)
    {
        $this->session_workflow = $session_workflow;
        $this->session_repository = $session_repository;
    }


    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    // RESTFUL CRUD START
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

    /**
     * Display a listing of the resource.
     *
     * @param Request  $request
     * @return SessionRepository
     */
    public function index(Request $request)
    {
        $this->authorize('list',$this->session_repository);
        $structIndexSession = new StructIndexSession( $request->all() );
        $sessionResourceCollection = $this->session_workflow->index($structIndexSession);
        return response()->json( $sessionResourceCollection );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {   
        $this->authorize('create',$this->session_repository);
        return view('session_create');  //ayto DEN tha to exw sto restful_crud code generation
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SessionStoreRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(SessionStoreRequest $request)
    {
        $this->authorize('create',$this->session_repository);
        $structStoreSession = new StructStoreSession( $request->all() );
        $sessionResource = $this->session_workflow->store($structStoreSession);
        return response()->json( $sessionResource );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $this->authorize('view', [$this->session_repository, $id]);
        return response()->json( $this->session_workflow->show($id) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $this->authorize('update', [$this->session_repository, $id]);
        $session = $this->session_workflow->edit($id);
        return view('session_edit', compact('session'));    //ayto DEN tha to exw sto restful_crud code generation
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SessionUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(SessionUpdateRequest $request, $id)
    {   
        $this->authorize('update', [$this->session_repository, $id]);
        $structUpdateSession = new StructUpdateSession($request->all());        
        $sessionResource = $this->session_workflow->update($structUpdateSession);
        return response()->json( $sessionResource );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->authorize('delete', [$this->session_repository, $id]);
        return response()->json( $this->session_workflow->destroy($id) );
    }

    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    // RESTFUL CRUD END
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=



    
}
