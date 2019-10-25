<?php

namespace App\Http\Controllers\Trident;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Trident\Interfaces\Workflows\Logic\EpisodeInterface as EpisodeWorkflow;
use App\Trident\Interfaces\Workflows\Repositories\EpisodeRepositoryInterface as EpisodeRepository;
use App\Trident\Workflows\Validations\EpisodeStoreRequest;
use App\Trident\Workflows\Validations\EpisodeUpdateRequest;
use App\Trident\Workflows\Schemas\Logic\Episode\Typed\StructIndexEpisode;
use App\Trident\Workflows\Schemas\Logic\Episode\Typed\StructStoreEpisode;
use App\Trident\Workflows\Schemas\Logic\Episode\Typed\StructUpdateEpisode;

class EpisodeController extends Controller
{
    
    /**
     * @var EpisodeWorkflow
     */
    protected $episode_workflow;
    
    /**
     * @var EpisodeRepository
     */
    protected $episode_repository;

    public function __construct(EpisodeWorkflow $episode_workflow, EpisodeRepository $episode_repository)
    {
        $this->episode_workflow = $episode_workflow;
        $this->episode_repository = $episode_repository;
    }


    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    // RESTFUL CRUD START
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

    /**
     * Display a listing of the resource.
     *
     * @param Request  $request
     * @return EpisodeRepository
     */
    public function index(Request $request)
    {
        $this->authorize('list',$this->episode_repository);
        $structIndexEpisode = new StructIndexEpisode( $request->all() );
        $episodeResourceCollection = $this->episode_workflow->index($structIndexEpisode);
        return response()->json( $episodeResourceCollection );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {   
        $this->authorize('create',$this->episode_repository);
        return view('episode_create');  //ayto DEN tha to exw sto restful_crud code generation
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EpisodeStoreRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(EpisodeStoreRequest $request)
    {
        $this->authorize('create',$this->episode_repository);
        $structStoreEpisode = new StructStoreEpisode( $request->all() );
        $episodeResource = $this->episode_workflow->store($structStoreEpisode);
        return response()->json( $episodeResource );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $this->authorize('view', [$this->episode_repository, $id]);
        return response()->json( $this->episode_workflow->show($id) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $this->authorize('update', [$this->episode_repository, $id]);
        $episode = $this->episode_workflow->edit($id);
        return view('episode_edit', compact('episode'));    //ayto DEN tha to exw sto restful_crud code generation
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EpisodeUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(EpisodeUpdateRequest $request, $id)
    {   
        $this->authorize('update', [$this->episode_repository, $id]);
        $structUpdateEpisode = new StructUpdateEpisode($request->all());        
        $episodeResource = $this->episode_workflow->update($structUpdateEpisode);
        return response()->json( $episodeResource );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->authorize('delete', [$this->episode_repository, $id]);
        return response()->json( $this->episode_workflow->destroy($id) );
    }

    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    // RESTFUL CRUD END
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=



    
}
