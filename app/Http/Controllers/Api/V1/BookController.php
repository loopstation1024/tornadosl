<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;

class BookController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return BookResource::collection(Book::all());
    }

    /**
     * @param  Book  $book
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function show(Book $book)
    {
        return new BookResource(Book::findOrFail($book->id));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function store(Request $request)
    {
        try {
            $book = Book::create([
                'titulo' => $request->titulo,
                'autor' => $request->autor,
                'published_at' => $request->publishedAt
            ]);
        } catch (\Throwable $th) {
            return $th->getMessage();
            return response()->json(
                ['message' => 'An error occurred while creating the resource']
                , 500
            );
        }

        return new BookResource($book);
    }

    /**
     * @param Request $request
     * @param Book $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        try {
            $book->update([
                'titulo' => $request->titulo,
                'autor' => $request->autor,
                'publishedAt' => $request->published_at
            ]);
        } catch (\Throwable $th) {
            return response()->json(
                ['message' => 'Cannot update the resource']
                , 500
            );
        }

        return new BookResource($book);
    }

    /**
     * @param  Book $book
     * @return \Illuminate\Http\Response
     */
    public function delete(Book $book)
    {
        try {
            $book->delete();
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Cannot delete the resource'
            ], 500);
        }

        return response()->json([
            'message' => 'Resource deleted'
        ], 204);
    }
}
