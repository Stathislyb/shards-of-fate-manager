<?php

namespace App\Trident\Workflows\Logic;

use App\Models\Session as SessionModel;
use App\Trident\Workflows\Exceptions\SessionException;
use App\Trident\Interfaces\Workflows\Repositories\SessionRepositoryInterface as SessionRepository;
use App\Trident\Interfaces\Workflows\Logic\SessionInterface;
use App\Trident\Interfaces\Business\Logic\SessionInterface as SessionBusiness;
use App\Trident\Workflows\Schemas\Logic\Session\Typed\StructIndexSession;
use App\Trident\Workflows\Schemas\Logic\Session\Typed\StructStoreSession;
use App\Trident\Workflows\Schemas\Logic\Session\Typed\StructUpdateSession;
use App\Trident\Workflows\Schemas\Logic\Session\Resources\SessionResource;
use App\Trident\Workflows\Schemas\Logic\Session\Resources\SessionResourceCollection;

class Session implements SessionInterface
{
    
    /**
     * @var \App
     */
    protected $app;

    /**
     * @var SessionBusiness
     */
    protected $session_business;
    
    /**
     * @var SessionRepository
     */
    protected $session_repository;

    /**
     * constructor.
     *
     * @var string
     * @return void
     */
    public function __construct(SessionBusiness $session_business, SessionRepository $session_repository)
    {
        $this->session_business = $session_business;
        $this->session_repository = $session_repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @param  StructIndexSession $structIndexSession
     * @return SessionResourceCollection
     */
    public function index(StructIndexSession $structIndexSession): SessionResourceCollection
    {
        $data = $structIndexSession->getFilledValues();
        
        $sessions = $this->session_repository->get();
        return new SessionResourceCollection($sessions);
        
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
     * @param  StructStoreSession  $structStoreSession
     * @return SessionResource
     */
    public function store(StructStoreSession  $structStoreSession): SessionResource
    {        
        $data = $structStoreSession->getFilledValues();
        $new_session = $this->session_repository->create($data);

        return new SessionResource($new_session);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return SessionResource
     */
    public function show($id): SessionResource
    {
        $session = $this->session_repository->findOrFail($id);
        return new SessionResource($session);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return SessionModel
     */
    public function edit($id): SessionModel
    {
        return $this->session_repository->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StructUpdateSession  $structUpdateSession
     * @return SessionResource
     */
    public function update(StructUpdateSession  $structUpdateSession): SessionResource
    {   
        $id = $structUpdateSession['id'];
        $data = $structUpdateSession->getFilledValues();
        $session = $this->session_repository->findOrFail($id);

        try {
            $session->update($data);
        } catch (\Exception $e) {
            throw new SessionException('updateFailed');
        }

        return new SessionResource($session);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Boolean
     */
    public function destroy($id)
    {
        $deleted_count = $this->session_repository->destroy($id);
        return ($deleted_count > 0);
    }
}
