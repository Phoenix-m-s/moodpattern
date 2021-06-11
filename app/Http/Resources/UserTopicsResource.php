<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserTopicsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return  [

            'id'   =>  $this->id,
            'title'  =>  $this->title,
            'topic_type_class_id'  =>  $this->topic_type_class_id,
            'save_step'  =>  $this->save_step,
            'users_id'  =>  $this->users_id,
        ];


    }


}
