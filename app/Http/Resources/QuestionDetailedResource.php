<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionDetailedResource extends JsonResource
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
            'text' => $this->text,
            'description' => $this->description,
            'answers' => AnswerResource::collection($this->answers),
            'required' => $this->required,
            'responses' => ResponseResource::collection($this->responses),
            'form' => new FormResource($this->form),
            'type' => $this->type,
            'conditions' => ConditionResource::collection($this->conditions)
        ];
    }
}
