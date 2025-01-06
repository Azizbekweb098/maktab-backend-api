<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkersReource extends JsonResource
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
            'last_name' => $this->last_name,
            'ish_kuni' => $this->ish_kuni,
            'tell' => $this->tell,
            'link' => $this->link,
            'lorem' => $this->lorem,
            'rahbariyat' => $this->rahbaryat ? $this->rahbaryat->kim : null,
            'teacher' => $this->teacher ? $this->teacher->toyifa : null,
            
        ];
    }
}
