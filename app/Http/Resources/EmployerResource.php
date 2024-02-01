<?php

namespace App\Http\Resources;

use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Employer */
class EmployerResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'matricule' => $this->matricule,
            'prenom' => $this->prenom,
            'nom' => $this->nom,
            'tel' => $this->tel,
            'email' => $this->email,
            'salaire' => $this->salaire,
            'dateNaiss' => $this->dateNaiss,
            'service_id' => $this->service_id,

            'service' => new ServiceResource($this->whenLoaded('service')),
        ];
    }
}
