<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MealResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $this->image,
            'is_available' => $this->is_available,
            'preparation_time' => $this->preparation_time,
            'category' => $this->category,
            'restaurant' => $this->restaurant,
            'reviews' => $this->reviews,
        ];
    }
}
