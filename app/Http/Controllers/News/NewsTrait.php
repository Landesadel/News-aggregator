<?php

namespace App\Http\Controllers\News;

trait NewsTrait {

    public function getNews(string $category = null, int $id = null): array
    {
        $newsCollection = [];
        $quantityNews = 6;

        if ($id === null) {
            for ($i = 1; $i < $quantityNews; $i++) {
                $newsCollection[] = [
                    'id' => $i,
                    'author' => \fake()->userName(),
                    'title' => \fake()->jobTitle(),
                    'text' => \fake()->text(150),
                    'created_at' => \now()->format('h:i d-m-y'),
                ];
            }

            return $newsCollection;
        }

        return  $news = [
            'id' => $id,
            'category' => $category,
            'author' => \fake()->userName(),
            'title' => \fake()->jobTitle(),
            'text' => \fake()->text(150),
            'created_at' => \now()->format('h:i d-m-y'),
        ];
    }
}
