<?php

namespace App\Http\Controllers\Trident;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Container\Container as App;
use App\Trident\Interfaces\Workflows\Logic\FocusGoalInterface as FocusGoalWorkflow;
use App\Trident\Interfaces\Workflows\Repositories\FocusGoalRepositoryInterface as FocusGoalRepository;
use App\Trident\Workflows\Exceptions\FocusGoalException;

class FocusGoalController extends Controller
{
    /**
     * @var FocusGoal
     */
    protected $focusGoal;

    public function __construct(FocusGoalWorkflow $focusGoal_workflow, FocusGoalRepository $focusGoal_repository)
    {
        $this->focusGoal_workflow = $focusGoal_workflow;
        $this->focusGoal_repository = $focusGoal_repository;
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
        return $this->focusGoal_repository->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $this->authorize('create',FocusGoalRepository::class);
        return view('focusGoal_create');  //ayto DEN tha to exw sto restful_crud code generation
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
		$data['user_id'] = auth()->id();

        return response()->json( $this->focusGoal_repository->create($data) );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', [$this->focusGoal_repository, $id]);
        return response()->json( $this->focusGoal_repository->find($id) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', [$this->focusGoal_repository, $id]);
        $focusGoal = $this->focusGoal_repository->find($id);
        return view('focusGoal_edit', compact('focusGoal'));    //ayto DEN tha to exw sto restful_crud code generation
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $this->authorize('update', [$this->focusGoal_repository, $id]);
        return response()->json( $this->focusGoal_repository->find($id)->update($request->all()) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', [$this->focusGoal_repository, $id]);
        return response()->json( $this->focusGoal_repository->destroy($id) );
    }

    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    // RESTFUL CRUD END
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=



    
}
