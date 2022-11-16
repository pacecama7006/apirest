<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{

    // public static $wrap = 'book';
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
            'name' => $this->name,
            'publication_year' => $this->publication_year,
            'isbn' => $this->isbn,
            // Aquí llamamos una relación de muchos a muchos
            'authors' => AuthorResource::collection($this->whenLoaded('authors')),
            // Aquí llamamos una relación de uno a muchos
            'book_status' => new BookStatusResource($this->book_status)
        ];
    }
}
