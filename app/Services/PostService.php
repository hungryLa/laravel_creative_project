<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Topic;
use Illuminate\Support\Facades\DB;

class PostService
{

    public function store($data)
    {

        try {
            DB::beginTransaction();
            $tags = $data['tags'];
            $topic = $data['topic'];
            unset($data['tags'], $data['topic']);


            $tagIds = $this->getTagIds($tags);
            $data['topic_id'] = $this->getTopicId($topic);

            $post = Post::create($data);

            $post->tags()->attach($tagIds);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }


        return $post;
    }

    public function update($post, $data)
    {
        try {
            DB::beginTransaction();
            $tags = $data['tags'];
            $topic = $data['topic'];
            unset($data['tags'], $data['topic']);

            $tagIds = $this->getTagIdsWithUpdate($tags);
            $data['topic_id'] = $this->getTopicIdWithUpdate($topic);

            $post->update($data);

            $post->tags()->sync($tagIds);


        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return $post->fresh();
    }

    private function getTopicId($item)
    {
        $topic = !isset($item['id']) ? Topic::create($item) : Topic::find($item['id']);
        return $topic->id;
    }

    private function getTopicIdWithUpdate($item)
    {
        if (!isset($item['id'])) {
            $topic = Topic::create($item);
        } else {
            $currentTopic = Topic::find($item['id']);
            $currentTopic->update($item);
            $topic = $currentTopic->fresh();
        }
        return $topic->id;
    }

    private function getTagIds($tags)
    {
        $tagIds = [];
        foreach ($tags as $tag) {

            $tag = !isset($tag['id']) ? Tag::create($tag) : Tag::find($tag['id']);
            $tagIds[] = $tag->id;
        }
        return $tagIds;
    }

    private function getTagIdsWithUpdate($tags)
    {
        $tagIds = [];
        foreach ($tags as $tag) {
            if (!isset($tag['id'])) {
                $tag = Tag::create($tag);

            } else {
                $currentTag = Tag::find($tag['id']);
                $currentTag->update($tag);
                $tag = $currentTag->fresh();
            }
            $tagIds[] = $tag->id;
        }

        return $tagIds;
    }
}

?>
