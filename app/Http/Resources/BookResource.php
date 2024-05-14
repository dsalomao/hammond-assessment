<?php

namespace App\Http\Resources;

use GDebrauwer\Hateoas\Traits\HasLinks;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Nicebooks\Isbn\IsbnTools;

class BookResource extends JsonResource
{
    use HasLinks;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $tools = new IsbnTools();

        $formatted = $this->isbn ? $tools->format($this->isbn) : null;

        return [
            'id' => $this->id,
            'name' => $this->name,
            'isbn_raw' => $this->isbn,
            'isbn_formatted' => $formatted,
            'value' => $this->value,
            'stores' => new StoreCollection($this->whenLoaded('stores')),
            // 'created_at' => $this->created_at,
            // 'updated_at' => $this->updated_at,
            '_links' => $this->links()
        ];
    }
}
