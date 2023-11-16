<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChapterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
          'id' => $this->id, 
          'bookId' => $this->book_id,  
          'numberChapter' => $this->number_chapter,  
          'title' => $this->title,  
          'resumen' => $this->resumen,  
        ];
    }
}
