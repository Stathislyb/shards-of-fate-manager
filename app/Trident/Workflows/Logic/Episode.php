<?php

namespace App\Trident\Workflows\Logic;

use App\Models\Episode as EpisodeModel;
use App\Trident\Workflows\Exceptions\EpisodeException;
use App\Trident\Interfaces\Workflows\Repositories\EpisodeRepositoryInterface as EpisodeRepository;
use App\Trident\Interfaces\Workflows\Logic\EpisodeInterface;
use App\Trident\Interfaces\Business\Logic\EpisodeInterface as EpisodeBusiness;
use App\Trident\Workflows\Schemas\Logic\Episode\Typed\StructIndexEpisode;
use App\Trident\Workflows\Schemas\Logic\Episode\Typed\StructStoreEpisode;
use App\Trident\Workflows\Schemas\Logic\Episode\Typed\StructUpdateEpisode;
use App\Trident\Workflows\Schemas\Logic\Episode\Resources\EpisodeResource;
use App\Trident\Workflows\Schemas\Logic\Episode\Resources\EpisodeResourceCollection;

class Episode implements EpisodeInterface
{
    
    /**
     * @var \App
     */
    protected $app;

    /**
     * @var EpisodeBusiness
     */
    protected $episode_business;
    
    /**
     * @var EpisodeRepository
     */
    protected $episode_repository;

    /**
     * constructor.
     *
     * @var string
     * @return void
     */
    public function __construct(EpisodeBusiness $episode_business, EpisodeRepository $episode_repository)
    {
        $this->episode_business = $episode_business;
        $this->episode_repository = $episode_repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @param  StructIndexEpisode $structIndexEpisode
     * @return EpisodeResourceCollection
     */
    public function index(StructIndexEpisode $structIndexEpisode): EpisodeResourceCollection
    {
        $data = $structIndexEpisode->getFilledValues();
        
        $episodes = $this->episode_repository->get();
        return new EpisodeResourceCollection($episodes);
        
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
     * @param  StructStoreEpisode  $structStoreEpisode
     * @return EpisodeResource
     */
    public function store(StructStoreEpisode  $structStoreEpisode): EpisodeResource
    {        
        $data = $structStoreEpisode->getFilledValues();
        $new_episode = $this->episode_repository->create($data);

        return new EpisodeResource($new_episode);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return EpisodeResource
     */
    public function show($id): EpisodeResource
    {
        $episode = $this->episode_repository->findOrFail($id);
        return new EpisodeResource($episode);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return EpisodeModel
     */
    public function edit($id): EpisodeModel
    {
        return $this->episode_repository->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StructUpdateEpisode  $structUpdateEpisode
     * @return EpisodeResource
     */
    public function update(StructUpdateEpisode  $structUpdateEpisode): EpisodeResource
    {   
        $id = $structUpdateEpisode['id'];
        $data = $structUpdateEpisode->getFilledValues();
        $episode = $this->episode_repository->findOrFail($id);

        try {
            $episode->update($data);
        } catch (\Exception $e) {
            throw new EpisodeException('updateFailed');
        }

        return new EpisodeResource($episode);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Boolean
     */
    public function destroy($id)
    {
        $deleted_count = $this->episode_repository->destroy($id);
        return ($deleted_count > 0);
    }
}
