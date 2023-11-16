<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ChapterResource;

class ChapterController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ChapterResource::collection(Chapter::all());
    }

    /**
     * @param  Chapter $chapter
     * @return \Illuminate\Http\Response
     */
    public function show(Chapter $chapter)
    {
        return new ChapterResource(Chapter::findOrFail($chapter->id));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function store(Request $request)
    {
        try {
            $book = Book::findOrFail($request->bookId);
        } catch (\Throwable $th) {
            return response()->json(
                ['message' => 'Book id does not exist']
                , 404
            );
        }

        try {
            $chapter =  Chapter::create([
                'book_id' => $request->bookId,
                'number_chapter' => $request->numberChapter,
                'title' => $request->title,
                'resumen' => $request->resumen
            ]);
        } catch (\Throwable $th) {
            return response()->json(
                ['message' => 'An error occurred while creating the resource']
                , 500
            );
        }

        return new ChapterResource($chapter);
    }

    /**
     * @param  Chapter $chapter
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chapter $chapter)
    {
        try {
            $book = Book::findOrFail($request->bookId);
        } catch (\Throwable $th) {
            return response()->json(
                ['message' => 'Book id does not exist']
                , 404
            );
        }

        try {
            $chapter->update([
                'book_id' => $request->bookId,
                'number_chapter' => $request->numberChapter,
                'title' => $request->title,
                'resumen' => $request->resumen
            ]);
        } catch (\Throwable $th) {
            return response()->json(
                ['message' => 'Cannot update the resource']
                , 500
            );
        }
        
        return new ChapterResource($chapter);
    }

    /**
     * @param  Chapter $chapter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chapter $chapter)
    {
        try {
            $chapter->delete();
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Cannot delete the resource'
            ], 500);
        }

        return response()->json([
            'message' => 'Resource deleted'
        ], 204);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getByBookId(string $id)
    {
        if (is_numeric($id) === false) {
            return response()->json([
                'message' => 'Invalid Book ID'
            ], 404);
        }

        $chapters = Chapter::where('book_id', $id)->get();
        return ChapterResource::collection($chapters);
    }
}
