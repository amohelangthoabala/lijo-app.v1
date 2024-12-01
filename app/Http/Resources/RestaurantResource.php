<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
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
            'logo' => $this->logo,
            'contact_information' => $this->contact_information,
            'rating' => $this->rating,
            'opening_hours' => $this->opening_hours,
            'menus' => $this->menus,
            'meals' => $this->meals,
            'address' => $this->address,
            'reviews' => $this->reviews,
            'owner' => $this->owner,
        ];
    }
}
