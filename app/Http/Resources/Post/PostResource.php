<?php

namespace App\Http\Resources\Post;

use App\Http\Resources\Tag\TagResource;
use App\Http\Resources\Topic\TopicResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'title' => $this->title,
            'content' => $this->content,
            'image' => $this->image,
            'topic' => new TopicResource($this->topic),
            'tags' => TagResource::collection($this->tags),
        ];
    }
}
