<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'number' => $this->number,
            'type' => $this->type,
            'date' => $this->date,
            'customer'=> $this->customer,
            'items'=> $this->items,
            'delivery'=> $this->delivery,
        ];
    }
}
