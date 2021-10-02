<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
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
            'type' => $this->type,
            'description' => $this->description,
            'answers' => AnswerResource::collection($this->answers),
            'replies' => count($this->responses),
            'required' => $this->required,
            'conditions' => ConditionResource::collection($this->conditions),
            'show' => $this->show
        ];
    }
}
