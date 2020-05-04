<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class VacancyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title'=> $this->title,
            'description' => $this->description,
            'date_posted' => $this->date_posted,
            'expiry_date' => $this->expiry_date,
            'posted' => Carbon::parse($this->date_posted)->format('d/m/Y'),
            'due_date' => Carbon::parse($this->expiry_date)->format('d/m/Y'),
            'category' => $this->category->name,
            'location'=> $this->location->name,
            'job_nature' => $this->jobtype->name,
            'category_id' => $this->category_id,
            'location_id'=> $this->location_id,
            'job_type_id' => $this->job_type_id
        ];
    }
}
