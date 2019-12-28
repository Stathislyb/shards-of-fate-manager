<?php

namespace App\Http\Controllers\Trident;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Container\Container as App;
use App\Trident\Interfaces\Workflows\Logic\FocusInterface as FocusWorkflow;
use App\Trident\Interfaces\Workflows\Repositories\FocusRepositoryInterface as FocusRepository;
use App\Trident\Workflows\Exceptions\FocusException;
use App\Trident\Workflows\Schemas\Logic\Focus\Typed\StructIndexFocus;
use App\Trident\Workflows\Schemas\Logic\Focus\Typed\StructStoreFocus;
use App\Trident\Workflows\Schemas\Logic\Focus\Typed\StructUpdateFocus;

class FocusController extends Controller
{
    /**
     * @var Focus
     */
    protected $focus;

    public function __construct(FocusWorkflow $focus_workflow, FocusRepository $focus_repository)
    {
        $this->focus_workflow = $focus_workflow;
        $this->focus_repository = $focus_repository;
    }


    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    // RESTFUL CRUD START
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('list', $this->focus_repository);
        $structIndexFocus = new StructIndexFocus( $request->all() );
        $focusResourceCollection = $this->focus_workflow->index($structIndexFocus);
        return response()->json( $focusResourceCollection );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FocusStoreRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(FocusStoreRequest $request)
    {
        $this->authorize('create',$this->focus_repository);
        $structStoreFocus = new StructStoreFocus( $request->all() );
        $focusResource = $this->focus_workflow->store($structStoreFocus);
        return response()->json( $focusResource );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', [$this->focus_repository, $id]);
        return response()->json( $this->focus_workflow->show($id) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  FocusUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(FocusUpdateRequest $request, $id)
    {   
        $this->authorize('update', [$this->focus_repository, $id]);
        $structUpdateFocus = new StructUpdateFocus($request->all());        
        $focusResource = $this->focus_workflow->update($structUpdateFocus);
        return response()->json( $focusResource );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', [$this->focus_repository, $id]);
        return response()->json( $this->focus_workflow->destroy($id) );
    }

    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    // RESTFUL CRUD END
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    
}
