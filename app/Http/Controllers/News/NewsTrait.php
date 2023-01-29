<?php

namespace App\Http\Controllers\News;

trait NewsTrait {

    public function getNews(string $category = null): array
    {
        $newsCollection = [];
        $quantityNews = 6;

        for ($i = 1; $i < $quantityNews; $i++) {
            $newsCollection[] = [
                'id' => $i,
                'category' => $category,
                'author' => \fake()->userName(),
                'title' => \fake()->jobTitle(),
                'text' => \fake()->text(80),
                'created_at' => \now()->format('h:i d-m-y'),
            ];
        }

        return $newsCollection;
    }

    public function getArticle(int $id, string $category = null): array
    {
        return [
            'id' => $id,
            'category' => $category,
            'author' => \fake()->userName(),
            'title' => \fake()->jobTitle(),
            'text' => \fake()->text(150),
            'created_at' => \now()->format('h:i d-m-y'),
        ];
    }
}
