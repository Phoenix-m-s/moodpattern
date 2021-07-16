<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class topic_scores extends JsonResource
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
            'user_topics_id' => $this->user_topics_id,
            'approach' => $this->approach,
            'sensor_words_id' => $this->sensor_words_id,
            'score' => $this->score
        ];
    }
}
