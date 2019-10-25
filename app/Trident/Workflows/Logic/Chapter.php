<?php

namespace App\Trident\Workflows\Logic;

use App\Models\Chapter as ChapterModel;
use App\Trident\Workflows\Exceptions\ChapterException;
use App\Trident\Interfaces\Workflows\Repositories\ChapterRepositoryInterface as ChapterRepository;
use App\Trident\Interfaces\Workflows\Logic\ChapterInterface;
use App\Trident\Interfaces\Business\Logic\ChapterInterface as ChapterBusiness;
use App\Trident\Workflows\Schemas\Logic\Chapter\Typed\StructIndexChapter;
use App\Trident\Workflows\Schemas\Logic\Chapter\Typed\StructStoreChapter;
use App\Trident\Workflows\Schemas\Logic\Chapter\Typed\StructUpdateChapter;
use App\Trident\Workflows\Schemas\Logic\Chapter\Resources\ChapterResource;
use App\Trident\Workflows\Schemas\Logic\Chapter\Resources\ChapterResourceCollection;

class Chapter implements ChapterInterface
{
    
    /**
     * @var \App
     */
    protected $app;

    /**
     * @var ChapterBusiness
     */
    protected $chapter_business;
    
    /**
     * @var ChapterRepository
     */
    protected $chapter_repository;

    /**
     * constructor.
     *
     * @var string
     * @return void
     */
    public function __construct(ChapterBusiness $chapter_business, ChapterRepository $chapter_repository)
    {
        $this->chapter_business = $chapter_business;
        $this->chapter_repository = $chapter_repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @param  StructIndexChapter $structIndexChapter
     * @return ChapterResourceCollection
     */
    public function index(StructIndexChapter $structIndexChapter): ChapterResourceCollection
    {
        $data = $structIndexChapter->getFilledValues();
        
        $chapters = $this->chapter_repository->get();
        return new ChapterResourceCollection($chapters);
        
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
     * @param  StructStoreChapter  $structStoreChapter
     * @return ChapterResource
     */
    public function store(StructStoreChapter  $structStoreChapter): ChapterResource
    {        
        $data = $structStoreChapter->getFilledValues();
        $new_chapter = $this->chapter_repository->create($data);

        return new ChapterResource($new_chapter);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return ChapterResource
     */
    public function show($id): ChapterResource
    {
        $chapter = $this->chapter_repository->findOrFail($id);
        return new ChapterResource($chapter);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return ChapterModel
     */
    public function edit($id): ChapterModel
    {
        return $this->chapter_repository->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StructUpdateChapter  $structUpdateChapter
     * @return ChapterResource
     */
    public function update(StructUpdateChapter  $structUpdateChapter): ChapterResource
    {   
        $id = $structUpdateChapter['id'];
        $data = $structUpdateChapter->getFilledValues();
        $chapter = $this->chapter_repository->findOrFail($id);

        try {
            $chapter->update($data);
        } catch (\Exception $e) {
            throw new ChapterException('updateFailed');
        }

        return new ChapterResource($chapter);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Boolean
     */
    public function destroy($id)
    {
        $deleted_count = $this->chapter_repository->destroy($id);
        return ($deleted_count > 0);
    }
}
