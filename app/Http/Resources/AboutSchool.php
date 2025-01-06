<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AboutSchool extends JsonResource
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
            'sinflar_soni' => $this->sinflar_soni,
            'Oquvchilar_Soni' => $this->Oquvchilar_Soni,
            'Oqituvchilar_Soni' => $this->Oqituvchilar_Soni,
            'Bitiruvchilar_Soni' => $this->Bitiruvchilar_Soni,
        ];
    }

}
