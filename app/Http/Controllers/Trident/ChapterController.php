<?php

namespace App\Http\Controllers\Trident;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Trident\Interfaces\Workflows\Logic\ChapterInterface as ChapterWorkflow;
use App\Trident\Interfaces\Workflows\Repositories\ChapterRepositoryInterface as ChapterRepository;
use App\Trident\Workflows\Validations\ChapterStoreRequest;
use App\Trident\Workflows\Validations\ChapterUpdateRequest;
use App\Trident\Workflows\Schemas\Logic\Chapter\Typed\StructIndexChapter;
use App\Trident\Workflows\Schemas\Logic\Chapter\Typed\StructStoreChapter;
use App\Trident\Workflows\Schemas\Logic\Chapter\Typed\StructUpdateChapter;

class ChapterController extends Controller
{
    
    /**
     * @var ChapterWorkflow
     */
    protected $chapter_workflow;
    
    /**
     * @var ChapterRepository
     */
    protected $chapter_repository;

    public function __construct(ChapterWorkflow $chapter_workflow, ChapterRepository $chapter_repository)
    {
        $this->chapter_workflow = $chapter_workflow;
        $this->chapter_repository = $chapter_repository;
    }


    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    // RESTFUL CRUD START
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

    /**
     * Display a listing of the resource.
     *
     * @param Request  $request
     * @return ChapterRepository
     */
    public function index(Request $request)
    {
        $this->authorize('list',$this->chapter_repository);
        $structIndexChapter = new StructIndexChapter( $request->all() );
        $chapterResourceCollection = $this->chapter_workflow->index($structIndexChapter);
        return response()->json( $chapterResourceCollection );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {   
        $this->authorize('create',$this->chapter_repository);
        return view('chapter_create');  //ayto DEN tha to exw sto restful_crud code generation
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ChapterStoreRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ChapterStoreRequest $request)
    {
        $this->authorize('create',$this->chapter_repository);
        $structStoreChapter = new StructStoreChapter( $request->all() );
        $chapterResource = $this->chapter_workflow->store($structStoreChapter);
        return response()->json( $chapterResource );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $this->authorize('view', [$this->chapter_repository, $id]);
        return response()->json( $this->chapter_workflow->show($id) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $this->authorize('update', [$this->chapter_repository, $id]);
        $chapter = $this->chapter_workflow->edit($id);
        return view('chapter_edit', compact('chapter'));    //ayto DEN tha to exw sto restful_crud code generation
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ChapterUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ChapterUpdateRequest $request, $id)
    {   
        $this->authorize('update', [$this->chapter_repository, $id]);
        $structUpdateChapter = new StructUpdateChapter($request->all());        
        $chapterResource = $this->chapter_workflow->update($structUpdateChapter);
        return response()->json( $chapterResource );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->authorize('delete', [$this->chapter_repository, $id]);
        return response()->json( $this->chapter_workflow->destroy($id) );
    }

    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    // RESTFUL CRUD END
    //-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=



    
}
