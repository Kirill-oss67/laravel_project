<?php

namespace App\Services\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Database\Factories\CategoryFactory;
use Illuminate\Support\Facades\DB;            // импорт класса для работы с транзакциями 

class Service
{

    public function store($data)
    {
        try {
            Db::beginTransaction();         // запускаем класс с транзакцией или начинаем транзакцию 
            $category = $data['category'];
            $tags = $data['tags'];
            unset($data['tags'], $data['category']);


            $tagIds = $this->getTagIds($tags);
            $data['category_id'] = $this->getCategoryId($category);



            $post = Post::create($data);
            $post->tags()->attach($tagIds);

            Db::commit();   // запуск транзакции 

        } catch (\Exception $exception) {
            Db::rollBack();     // отменяем транзакцию или откатываем транзакцию 
            return $exception->getMessage();
        }

        return $post;
    }


    public function update($post,  $data)
    {   try{
            Db::beginTransaction();
            $category = $data['category'];
            $tags = $data['tags'];
            unset($data['tags'], $data['category']);

            $tagIds = $this->getTagIdsWithUpdate($tags);
            $data['category_id'] = $this->getCategoryIdWithUpdate($category);

            $post->update($data);
            $post->tags()->sync($tagIds); // удаляет старые привязки и создает новые
            Db::commit();
             }
        catch(\Exception $exception){
            Db::rollBack();     // отменяем транзакцию или откатываем транзакцию 
            return $exception->getMessage();

        }
        return $post->fresh();
    }


    private function getTagIds($tags)
    {
        $tagIds = [];
        foreach ($tags as $tag) {
            $tag = !isset($tag['id']) ? Tag::create($tag) : Tag::find($tag['id']);  // тернарный оператор
            $tagIds[] = $tag->id;
        }
        return $tagIds;
    }

    private function getCategoryId($item)
    {
        $category = !isset($item['id']) ? Category::create($item) : Category::find($item['id']);    // тернарный оператор
        return $category->id;
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

    private function getCategoryIdWithUpdate($item)
    {
        if (!isset($item['id'])) {
            $category = Category::create($item);
        } else {
            $category = Category::find($item['id']);
            $category->update($item);
            $category = $category->fresh();
        }
        return $category->id;
    }
}
